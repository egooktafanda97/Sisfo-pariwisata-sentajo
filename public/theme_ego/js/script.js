$(window).scroll(function(){
	var y = $(window).scrollTop();   
	if(y < 10){
		$('.main-nav').removeClass("nav-gradient");
	}
	if (y > 10){
		$('.main-nav').addClass("nav-gradient");
	}
});

$('.img-s').click(function(){
	$('#modal-img').attr('src',$(this).attr('src'));
})



//Rotating Menu Share Button DesainKode
$(document).ready(function(ev) {
	var toggle = $('#ss_toggle');
	var menu = $('#ss_menu');
	var rot;

	$('#ss_toggle').on('click', function(ev) {
		rot = parseInt($(this).data('rot')) - 180;
		menu.css('transform', 'rotate(' + rot + 'deg)');
		menu.css('webkitTransform', 'rotate(' + rot + 'deg)');
		if ((rot / 180) % 2 == 0) {
      //Moving in
      toggle.parent().addClass('ss_active');
      toggle.addClass('close');
  } else {
      //Moving Out
      toggle.parent().removeClass('ss_active');
      toggle.removeClass('close');
  }
  $(this).data('rot', rot);
});

	menu.on('transitionend webkitTransitionEnd oTransitionEnd', function() {
		if ((rot / 180) % 2 == 0) {
			$('#ss_menu div i').addClass('ss_animate');
		} else {
			$('#ss_menu div i').removeClass('ss_animate');
		}
	});

});

if(config.particlesJS){
	particlesJS("dashboard",{
		"particles": {
			"number": {
				"value": 80,
				"density": {
					"enable": true,
					"value_area": 800
				}
			},
			"color": {
				"value": "#ffffff"
			},
			"shape": {
				"type": "circle",
				"stroke": {
					"width": 0,
					"color": "#000000"
				},
				"polygon": {
					"nb_sides": 5
				},
				"image": {
					"src": "img/github.svg",
					"width": 100,
					"height": 100
				}
			},
			"opacity": {
				"value": 0.5,
				"random": false,
				"anim": {
					"enable": false,
					"speed": 1,
					"opacity_min": 0.1,
					"sync": false
				}
			},
			"size": {
				"value": 3,
				"random": true,
				"anim": {
					"enable": false,
					"speed": 40,
					"size_min": 0.1,
					"sync": false
				}
			},
			"line_linked": {
				"enable": true,
				"distance": 150,
				"color": "#ffffff",
				"opacity": 0.4,
				"width": 1
			},
			"move": {
				"enable": true,
				"speed": 6,
				"direction": "none",
				"random": false,
				"straight": false,
				"out_mode": "out",
				"bounce": false,
				"attract": {
					"enable": false,
					"rotateX": 600,
					"rotateY": 1200
				}
			}
		},
		"interactivity": {
			"detect_on": "canvas",
			"events": {
				"onhover": {
					"enable": true,
					"mode": "repulse"
				},
				"onclick": {
					"enable": true,
					"mode": "push"
				},
				"resize": true
			},
			"modes": {
				"grab": {
					"distance": 400,
					"line_linked": {
						"opacity": 1
					}
				},
				"bubble": {
					"distance": 400,
					"size": 40,
					"duration": 2,
					"opacity": 8,
					"speed": 3
				},
				"repulse": {
					"distance": 200,
					"duration": 0.4
				},
				"push": {
					"particles_nb": 4
				},
				"remove": {
					"particles_nb": 2
				}
			}
		},
		"retina_detect": true
	});

}



if(config._3dCloud == true){

// 3d cloud skill

	// var count_particles, stats, update; 
	// stats = new Stats; stats.setMode(0); 
	// stats.domElement.style.position = 'absolute'; 
	// stats.domElement.style.left = '0px'; 
	// stats.domElement.style.top = '0px'; 
	// document.body.appendChild(stats.domElement); 

	// count_particles = document.querySelector('.js-count-particles'); update = function() { stats.begin(); stats.end(); if (window.pJSDom[0].pJS.particles && window.pJSDom[0].pJS.particles.array) { count_particles.innerText = window.pJSDom[0].pJS.particles.array.length; } requestAnimationFrame(update); }; requestAnimationFrame(update);

	$( document ).ready( function() {
		var entries = [
		{ label: 'SQL Mysql', url: '#', target: '_top' }, 
		{ label: 'Css', url: '#', target: '_top' },
		{ label: 'Jquery', url: '#', target: '_top' },
		{ label: 'Bootstrap', url: '#', target: '_top' },
		{ label: 'JavaScript', url: '#', target: '_top' },
		{ label: 'Vue Js', url: '#', target: '_top' },
		{ label: 'Laravel', url: '#', target: '_top' },
		{ label: 'PHP', url: '#', target: '_top' },
		{ label: 'Codeignither', url: '#', target: '_top' },
		{ label: 'Python', url: '#', target: '_top' },
		{ label: 'C', url: '#', target: '_top' },
		{ label: 'Arduino', url: '#', target: '_top' },
		{ label: 'Flutter', url: '#', target: '_top' },
		{ label: 'JAVA', url: '#', target: '_top' },
		{ label: 'Android Studio', url: '#', target: '_top' },
		{ label: 'React Js', url: '#', target: '_top' },
		{ label: 'Delhi', url: '#', target: '_top' },
		{ label: 'Visual Basic', url: '#', target: '_top' },
		{ label: 'GIS', url: '#', target: '_top' },
		{ label: 'JAVA', url: '#', target: '_top' },
		{ label: 'Photoshop', url: '#', target: '_top' },
		{ label: 'Adobe Premier', url: '#', target: '_top' },
		{ label: 'Adobe After Effect', url: '#', target: '_top' },
		{ label: 'Adobe XD', url: '#', target: '_top' },
		];
		var settings = {
			entries: entries,
			width: '100%',
			height: '100%',
			radius: '65%',
			radiusMin: 75,
			bgDraw: true,
			bgColor: 'transparent',
			opacityOver: 1.00,
			opacityOut: 0.05,
			opacitySpeed: 6,
			fov: 800,
			speed: 1,
			fontFamily: 'Oswald, Arial, sans-serif',
			fontSize: '15',
			fontColor: '#111',
                fontWeight: 'bold',//bold
                fontStyle: 'normal',//italic 
                fontStretch: 'normal',//wider, narrower, ultra-condensed, extra-condensed, condensed, semi-condensed, semi-expanded, expanded, extra-expanded, ultra-expanded
                fontToUpperCase: true
            };
            //var svg3DTagCloud = new SVG3DTagCloud( document.getElementById( 'holder'  ), settings );
            $( '#tag-cloud' ).svg3DTagCloud( settings );
        } );

	
    // reting skill
    const hiddenClass = 'hidden-content';

    toggleContent = (item) => {
    	let arrow = document.querySelector(`${item}-trigger > i`);
    	arrow.classList.toggle('rotate0');
    	arrow.classList.toggle('rotate90');

    	let content = document.querySelector(`${item}-content`);
    	content.classList.toggle(hiddenClass);
    }
}


// nav scroll

$(".item-menu").on('click', function(e) {	
	e.preventDefault();


	var hash = this.hash;


	$('html, body').animate({
		scrollTop: $(hash).offset().top
	}, 1000, function(){
		window.location.hash = hash;
	});

});

// nav sidebar
const $button  = document.querySelector('#sidebar-toggle');
const $wrapper = document.querySelector('#wrapper');

$button.addEventListener('click', (e) => {
	e.preventDefault();
	$wrapper.classList.toggle('toggled');
});