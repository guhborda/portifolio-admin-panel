function debounce(func, wait, immediate) {
	var timeout;
	return function() {
		var context = this, args = arguments;
		var later = function() {
			timeout = null;
			if (!immediate) func.apply(context, args);
		};
		var callNow = immediate && !timeout;
		clearTimeout(timeout);
		timeout = setTimeout(later, wait);
		if (callNow) func.apply(context, args);
	};
};

const target = document.querySelectorAll('[data-anime]');

const animationClass= 'animate';

function animeScroll(){

	const windowTop = window.pageYOffset + ((window.innerHeight *3)/4);
	target.forEach(function(element){
		if((windowTop)> element.offsetTop){
			element.classList.add(animationClass);
		}
	});
}

window.addEventListener('scroll',debounce(function(){
	animeScroll();
},200));

$(document).ready(function(){
	$('body').addClass(animationClass);
	$(".box-page-1").addClass(animationClass);
		
	}
);
// Slider Projetos
var item =$('.item');
var itemsize= item.length;
var content_slide = $('.content_slider');
var content = $('.conteudo');
var width = (item.outerWidth() + parseInt(item.css('margin-right')) )* (itemsize);
$('.content_slider').css('width',width);
var numImgs = 4;
var margin = 10;
var ident = 0;
var count = (item.length / numImgs) -1;
var slide = (numImgs * margin) + (item.outerWidth()* numImgs);
console.log(count);


$('.next').click(function(){

      if(ident< count){
      	ident++;
      	$('.content_slider').animate({'margin-left' : '-='+slide+'px'},'500');
     	}
});
$('.previous').click(function(){
       
        if(ident >= 1){
      	ident--;
      	$('.content_slider').animate({'margin-left' : '+='+slide+'px'},'500');
     	}
        
       
        
  
})

