(function(window) {
	
	function triggerCallback(e, callback) {
		if(!callback || typeof callback !== 'function') {
			return;
		}
		var files;
		if(e.dataTransfer) {
			files = e.dataTransfer.files;
		} else if(e.target) {
			files = e.target.files;
		}
		callback.call(null, files);
	}
	
	function makeDroppable(ele, callback) {
		
		var input = document.createElement('input');
		var fileInput = document.querySelector('input');
	
		input.setAttribute('type', 'file');
		input.setAttribute('multiple', true);
		input.style.display = 'none';
		input.addEventListener('change', function(e) {
			triggerCallback(e, callback);
		});
		ele.appendChild(input);
		
		ele.addEventListener('dragover', function(e) {
			e.preventDefault();
			e.stopPropagation();
			ele.classList.add('dragover');
		});
		
		ele.addEventListener('dragleave', function(e) {
			e.preventDefault();
			e.stopPropagation();
			ele.classList.remove('dragover');
		});
		
		ele.addEventListener('drop', function(e) {
			e.preventDefault();
			e.stopPropagation();
			ele.classList.remove('dragover');
			triggerCallback(e, callback);
			fileInput.files = e.dataTransfer.files;
		});
		
		ele.addEventListener('click', function() {
			input.value = null;
			input.click();
		});
		
	}
	
	window.makeDroppable = makeDroppable;
	
})(this);


 
  (function(window) {
    makeDroppable(window.document.querySelector('.droppable'), function(files) {
//      var output = document.querySelector('.output');
//      output.innerHTML = '';
//      for(var i=0; i<files.length; i++) {
//        if(files[i].type.indexOf('image/') === 0) {
//          output.innerHTML += '<img width="200" src="' + URL.createObjectURL(files[i]) + '" />';
//        }
//        output.innerHTML += '<p>'+files[i].name+'</p>';
//      }
    });
  })(this);  
  
  

$(document).ready(function(){

	var canvas = document.getElementById('avatar');
	ctx = canvas.getContext('2d');
	
	// core drawing function
	var drawMeme = function() {
		
		var img = document.getElementById('avatar-back');
		var logo = document.getElementById('avatar-front');
		
		//var overlay = "rgba(255,255,255,.25)";
		//var fontSize = parseInt( $('#text_font_size').val() );
		
		var size = parseInt( 300 );
		
		var overlayOpacity = parseInt( $('#overlay-opacity').val() ).toFixed(2) / 100;
		var overlayOpacity2 = 1;
		
		// set form field properties
		//$('#text_top_offset').attr('max', size);
		//$('#text_bottom_offset').attr('max', size);
		
		// initialize canvas element with desired dimensions
		canvas.width = size;
		canvas.height = size;
		
		ctx.clearRect(0, 0, canvas.width, canvas.height);

		// calculate minimum cropping dimension
		var croppingDimension = img.height;
		if( img.width < croppingDimension ){
			croppingDimension = img.width;
		}
		
		var croppingDimension2 = logo.height;
		if( logo.width < croppingDimension2 ){
			croppingDimension2 = logo.width;
		}
		
		console.log(croppingDimension);
		console.log(croppingDimension2);
				
		ctx.drawImage(img, 0, 0, croppingDimension, croppingDimension, 0, 0, size, size);
		
		var grd = ctx.createRadialGradient(150, 150, 0, 150, 150, 300);
		grd.addColorStop(0,"rgba( 50, 50, 50, " + overlayOpacity + " )");
		grd.addColorStop(1,"rgba( 50, 50, 50, " + overlayOpacity2 + " )");
		ctx.fillStyle=grd;
		ctx.fillRect(0, 0, size, size);

		ctx.drawImage(logo, 0, 0, croppingDimension2, croppingDimension2, 0, 0, size, size);

	};
	
	// read selected input image from upload field and display it in browser
	$("#file-upload").change(function(){
		var input = this;
		
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			
			reader.onload = function (e) {
				$('#avatar-back').attr('src', e.target.result);
			}

			reader.readAsDataURL(input.files[0]);
		}
		
		window.setTimeout(function(){
			drawMeme();
		}, 500);
	});
	
	$(".icons a").click(function(e){
		e.preventDefault();
		var src = $(this).children('img').attr('src');
		$('#avatar-front').attr('src', src);
		$(".icons a").removeClass('active');
		$(this).addClass('active');
		drawMeme();
	});
	
	$(".backgrounds a").click(function(e){
		e.preventDefault();
		var src = $(this).children('img').attr('src');
		$('#avatar-back').attr('src', src);
		$(".backgrounds a").removeClass('active');
		$(this).addClass('active');
		drawMeme();
	});
		
	$(document).on('input change', '#overlay-opacity', function() {
		drawMeme();
	});
		 
	$('#download_avatar').click(function(e){
		$(this).attr('href', canvas.toDataURL());
		$(this).attr('download', 'avatar.png');
	});
	
	// init at startup
	drawMeme();
	
	
	/**
	 * TOOLTIPS
	 */
	$(function () {
	  $('[data-toggle="tooltip"]').tooltip()
	})
	
	/**
	 * SWIPER
	 */
	var swiper = new Swiper('.swiper-container', {
		slidesPerView: 6,
		slidesPerColumn: 2,
		spaceBetween: 10,
		mousewheel: true,
		keyboard: {
			enabled: true,
		},
		freeMode: true,
		scrollbar: {
			el: '.swiper-scrollbar',
			draggable: true,
		},
		breakpoints: {
			1200: {
				slidesPerView: 6,
				spaceBetween: 10,
			},
			1024: {
				slidesPerView: 5,
				spaceBetween: 10,
			},
			768: {
				slidesPerView: 4,
				spaceBetween: 10,
			},
			576: {
				slidesPerView: 3,
				spaceBetween: 10,
			}
		}
	});		

});