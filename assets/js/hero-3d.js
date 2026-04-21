/**
 * Abhyasa — hero-3d.js
 * Rotating DNA double-helix via Three.js — with perf guards:
 *  - renders ONLY when hero is in viewport (IntersectionObserver)
 *  - pauses on tab blur
 *  - reduced geometry/particle count vs earlier version
 *  - stops rotation if prefers-reduced-motion
 *  - bails silently if WebGL / Three.js unavailable
 */
(() => {
  if (!window.THREE) return;
  const canvas = document.querySelector('.hero-3d-canvas');
  if (!canvas) return;

  try {
    const test = document.createElement('canvas').getContext('webgl') ||
                 document.createElement('canvas').getContext('experimental-webgl');
    if (!test) return;
  } catch (_) { return; }

  const THREE = window.THREE;
  const container = canvas;
  const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  const renderer = new THREE.WebGLRenderer({ antialias: true, alpha: true, powerPreference: 'high-performance' });
  renderer.setPixelRatio(Math.min(window.devicePixelRatio, 1.5)); // cap DPR for perf
  renderer.setSize(container.clientWidth, container.clientHeight);
  const el = renderer.domElement;
  el.style.display = 'block';
  el.style.width = '100%';
  el.style.height = '100%';
  container.appendChild(el);

  const scene  = new THREE.Scene();
  const camera = new THREE.PerspectiveCamera(40, container.clientWidth / container.clientHeight, 0.1, 100);
  camera.position.set(0, 0, 13);

  scene.add(new THREE.AmbientLight(0xffffff, 0.45));
  const key = new THREE.DirectionalLight(0xD9BC85, 1.3); key.position.set(5, 5, 5); scene.add(key);
  const fill = new THREE.DirectionalLight(0x6B82A6, 0.55); fill.position.set(-5, -3, 4); scene.add(fill);

  const dna = new THREE.Group();
  scene.add(dna);

  const radius = 1.6, height = 9, turns = 3, segments = 90;
  const p1 = [], p2 = [];
  for (let i = 0; i <= segments; i++) {
    const t = i / segments;
    const a = t * turns * Math.PI * 2;
    const y = t * height - height / 2;
    p1.push(new THREE.Vector3(Math.cos(a) * radius, y, Math.sin(a) * radius));
    p2.push(new THREE.Vector3(Math.cos(a + Math.PI) * radius, y, Math.sin(a + Math.PI) * radius));
  }

  const goldMat = new THREE.MeshStandardMaterial({
    color: 0xC9A96E, metalness: 0.7, roughness: 0.25,
    emissive: 0x3A2A10, emissiveIntensity: 0.3,
  });
  const rungMat = new THREE.MeshStandardMaterial({
    color: 0xE8D0A1, metalness: 0.4, roughness: 0.5, transparent: true, opacity: 0.85,
  });

  // Strands — reduced radial + tubular segments
  dna.add(new THREE.Mesh(new THREE.TubeGeometry(new THREE.CatmullRomCurve3(p1), 160, 0.08, 6, false), goldMat));
  dna.add(new THREE.Mesh(new THREE.TubeGeometry(new THREE.CatmullRomCurve3(p2), 160, 0.08, 6, false), goldMat));

  // Rungs + nodes — reduced to 20 from 28
  const rungs = 20;
  const rungGeom = new THREE.CylinderGeometry(0.05, 0.05, radius * 2, 6);
  const sphereGeom = new THREE.SphereGeometry(0.12, 12, 12);
  const up = new THREE.Vector3(0, 1, 0);
  for (let i = 0; i <= rungs; i++) {
    const t = i / rungs;
    const a = t * turns * Math.PI * 2;
    const y = t * height - height / 2;
    const a1 = new THREE.Vector3(Math.cos(a) * radius, y, Math.sin(a) * radius);
    const a2 = new THREE.Vector3(Math.cos(a + Math.PI) * radius, y, Math.sin(a + Math.PI) * radius);
    const mid = new THREE.Vector3().addVectors(a1, a2).multiplyScalar(0.5);
    const dir = new THREE.Vector3().subVectors(a2, a1);
    const len = dir.length(); dir.normalize();
    const rung = new THREE.Mesh(rungGeom, rungMat);
    rung.position.copy(mid);
    rung.scale.y = len / (radius * 2);
    rung.quaternion.setFromUnitVectors(up, dir);
    dna.add(rung);

    const s1 = new THREE.Mesh(sphereGeom, goldMat); s1.position.copy(a1); dna.add(s1);
    const s2 = new THREE.Mesh(sphereGeom, goldMat); s2.position.copy(a2); dna.add(s2);
  }

  // Particles — reduced 60 → 24
  const N = 24;
  const pos = new Float32Array(N * 3);
  for (let i = 0; i < N; i++) {
    pos[i * 3]     = (Math.random() - 0.5) * 16;
    pos[i * 3 + 1] = (Math.random() - 0.5) * 12;
    pos[i * 3 + 2] = (Math.random() - 0.5) * 10 - 2;
  }
  const pGeom = new THREE.BufferGeometry();
  pGeom.setAttribute('position', new THREE.BufferAttribute(pos, 3));
  const particles = new THREE.Points(pGeom, new THREE.PointsMaterial({
    color: 0xE8D0A1, size: 0.06, transparent: true, opacity: 0.55, sizeAttenuation: true,
  }));
  scene.add(particles);

  dna.rotation.x = 0.15;

  // Mouse tilt (throttled via rAF in animate())
  let targetRotX = 0.15, targetRotY = 0;
  const tiltHost = container.parentElement;
  if (tiltHost && !prefersReducedMotion) {
    tiltHost.addEventListener('pointermove', (e) => {
      const r = container.getBoundingClientRect();
      const x = (e.clientX - r.left) / r.width - 0.5;
      const y = (e.clientY - r.top)  / r.height - 0.5;
      targetRotY = x * 0.5;
      targetRotX = 0.15 + y * 0.25;
    }, { passive: true });
  }

  // Visibility / tab-blur gating
  let visible = false;
  let docVisible = !document.hidden;
  const io = new IntersectionObserver(([entry]) => {
    visible = entry.isIntersecting;
  }, { threshold: 0.05 });
  io.observe(container.closest('.hero-3d-stage') || container);
  document.addEventListener('visibilitychange', () => { docVisible = !document.hidden; });

  function resize() {
    const w = container.clientWidth, h = container.clientHeight;
    if (!w || !h) return;
    camera.aspect = w / h;
    camera.updateProjectionMatrix();
    renderer.setSize(w, h, false);
  }
  window.addEventListener('resize', resize, { passive: true });
  if (window.ResizeObserver) new ResizeObserver(resize).observe(container);

  const clock = new THREE.Clock();
  const baseSpeed = prefersReducedMotion ? 0 : 0.1;

  function animate() {
    requestAnimationFrame(animate);
    if (!visible || !docVisible) return; // skip when off-screen or tab hidden

    const t = clock.getElapsedTime();
    dna.rotation.y += baseSpeed * 0.016;
    dna.rotation.x += (targetRotX - dna.rotation.x) * 0.04;
    if (!prefersReducedMotion) {
      particles.rotation.y = t * 0.03;
    }
    renderer.render(scene, camera);
  }
  animate();
})();
