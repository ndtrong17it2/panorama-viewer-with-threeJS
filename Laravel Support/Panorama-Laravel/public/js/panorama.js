const TEXTURE_PATH = 'https://s3-us-west-2.amazonaws.com/s.cdpn.io/123879/';

/**
 * Create the animation request.
 */
if (!window.requestAnimationFrame) {
    window.requestAnimationFrame = (function () {
        return window.mozRequestAnimationFrame ||
            window.msRequestAnimationFrame ||
            window.oRequestAnimationFrame ||
            window.webkitRequestAnimationFrame ||
            function (callback, element) {
                // 60 FPS
                window.setTimeout(callback, 1000 / 60);
            };
    })();
}

/**
 * Set our global variables.
 */
var camera,
    scene,
    renderer,
    controls,
    container,
    effect,
    sphere;


$(document).ready(function () {
    if ($('#loaded-panorama').html().trim() === '') {
        var firstLoadImage;
        firstLoadImage = $('#list-panorama-image a:first-child').attr('data-value');
        // console.log($('#list-panorama-image a:first-child').attr('data-value'));
        onChangeImage(firstLoadImage);
    }
    $('.list-group a').on('click', function () {
        $('.list-group a.active').removeClass('active');
        $(this).addClass('active');
        // console.log($(this).attr('data-value'));
        onChangeImage($(this).attr('data-value'));
    });
});

// init();


function onChangeImage(imageLink) {
    // Create materials for Enceladus. 
    loader = new THREE.TextureLoader();
    // loader.setCrossOrigin('https://s.codepen.io');
    var texture = loader.load(imageLink);
    init(texture);
    animate();
}

/**
 * Initializer function.
 */
function init(texture) {
    // Build the container
    container = document.createElement('div');
    // document.body.appendChild(container);
    $('#loaded-panorama').empty().append(container);
    // Create the scene.
    scene = new THREE.Scene();

    rotationPoint = new THREE.Object3D();
    rotationPoint.position.set(0, 0, 100);
    scene.add(rotationPoint);

    // Create the camera.
    camera = new THREE.PerspectiveCamera(
        45, // Angle
        window.innerWidth / window.innerHeight, // Aspect Ratio.
        1, // Near view.
        23000 // Far view.
    );

    rotationPoint.add(camera);

    // Build the renderer.
    renderer = new THREE.WebGLRenderer({
        antialias: true,
        alpha: true
    });
    element = renderer.domElement;
    renderer.setSize(window.innerWidth, window.innerHeight);
    renderer.shadowMap.enabled;
    container.appendChild(element);

    // Build the controls.
    controls = new THREE.OrbitControls(camera, element);
    controls.enablePan = true;
    controls.enableZoom = true;
    controls.maxDistance = window.innerHeight / 4;
    controls.minDistance = 1;
    controls.target.copy(new THREE.Vector3(0, 0, -100));

    // Add the light source.
    var light = new THREE.PointLight(0xffffff, 1, 10000, 0);
    light.position.set(0, 0, 0);
    scene.add(light);

    var material = new THREE.MeshPhongMaterial({
        color: "#ffffff",
        shininess: 10,
        map: texture,
        specular: "#000000",
        side: THREE.BackSide,
    });

    // Add the sphere container.
    var geometry = new THREE.SphereGeometry(300, 128, 128);
    material.side = THREE.BackSide;
    var sphere = new THREE.Mesh(geometry, material);
    sphere.position.set(0, 0, 0);
    sphere.rotation.y = Math.PI / 1.8;
    sphere.side = THREE.BackSide;
    scene.add(sphere);

    window.addEventListener('resize', onWindowResize, false);
}

/**
 * Events to fire upon window resizing.
 */
function onWindowResize() {
    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();
    renderer.setSize(window.innerWidth, window.innerHeight);
}

/**
 * Updates to apply to the scene while running.
 */
function update() {
    camera.updateProjectionMatrix();
}

/**
 * Render the scene.
 */
function render() {
    renderer.render(scene, camera);
}

/**
 * Animate the scene.
 */
function animate() {
    requestAnimationFrame(animate);
    update();
    render();
}
