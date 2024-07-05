$(document).ready(function(){

let mainSlider = $('.main-slider');

mainSlider.lightSlider({
  item: 1,
  loop: true,
  slideMove: 1,
  easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  speed: 600,
  slideMargin: 0,
  addClass: 'main-slider-container',
  // adaptiveHeight: true,
  responsive: [
    {
      breakpoint: 576,
      settings: {
        controls: false,
      }
    }
  ]
});

let halfSlider = $('.half-slider');

halfSlider.lightSlider({
  item: 1,
  loop: false,
  slideMove: 1,
  easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  speed: 600,
  addClass: 'half-slider-container',
  adaptiveHeight: true,
  pager: false

});

let partnersSlider = $('.partners-slider');

partnersSlider.lightSlider({
  item: 5,
  loop: true,
  slideMove: 1,
  easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  speed: 600,
  adaptiveHeight: true,
  slideMargin: 15,
  addClass: 'partners-slider-container',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        item: 3,
      }
    },
    {
      breakpoint: 576,
      settings: {
        item: 2,
        controls: false,
        pager: false
      }
    }
  ]
});


let multySlider = $('.multy-slider');

multySlider.lightSlider({
  item: 3,
  loop: false,
  slideMove: 1,
  slideMargin: 15,
  easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  speed: 600,
  adaptiveHeight: true,
  addClass: 'multy-slider-container',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        item: 2,
      }
    },
    {
      breakpoint: 576,

      settings: {
        item: 1,
        controls: false,
      }
    }
  ]
});




let thumbSlider = $('.thumb-slider');

thumbSlider.lightSlider({

  gallery: true,
  item: 1,
  thumbItem: 4,
  slideMargin: 0,
  enableDrag: false,
  currentPagerPosition: 'left',
  addClass: 'thumb-slider-container',
});


let thumbSliderVericale = $('.thumb-slider-verticale');

thumbSliderVericale.lightSlider({

  gallery: true,
  item: 1,
  vertical: true,
  verticalHeight: 300,
  enableDrag: true,
  controls: false,
  // vThumbWidth:50,
  thumbItem: 4,


});

let longSlider = $('.long-slider');

longSlider.lightSlider({

  // item: 5,
  loop: true,
  slideMove: 1,
  easing: 'cubic-bezier(0.25, 0, 0.25, 1)',
  speed: 600,
  adaptiveHeight: true,
  addClass: 'long-slider-container',
  responsive: [
    {
      breakpoint: 992,
      settings: {
        item: 5,
      }
    },
    {
      breakpoint: 820,
      settings: {
        item: 3,
      }
    },
    {
      breakpoint: 576,

      settings: {
        item: 1,
        controls: false,
        pager: false
      }
    }
  ]
});





$('.input-date').each(function () {
  let dp = new AirDatepicker(this, {
    timepicker: true,
    timeFormat: 'hh:mm AA',
    onSelect({ date }) {
      $(this).addClass('input-empty');
      // console.log('done', date) 
    }
  });
})


function toInput(date) {
  $(date.input).parents('.range-slider-js').find('.from-range').val(date.from)
  $(date.input).parents('.range-slider-js').find('.to-range').val(date.to)
}


$(".range-slider").each(function () {
  let type = $(this).data('type');
  let min = $(this).data('min');
  let max = $(this).data('max');
  let from = $(this).data('from');
  let to = $(this).data('to');

  $(this).ionRangeSlider({
    type: type,
    min: min,
    max: max,
    from: from,
    to: to,
    skin: "round",
    drag_interval: false,
    grid_snap: true,
    grid_num: 10,
    onChange: toInput,
    // step: 100
  });
});

lightbox.option({
  'resizeDuration': 200,
  'wrapAround': true
})




var longPhone = 16;
$('.phone-mask').mask('+7(999)999-99-99');
$('.phone-mask').on('keydown', function (e) {

    // onkeypress = 'return event.charCode >= 48 && event.charCode <= 57'

    if (!(e.which >= 48 && e.which <= 57 || e.which == 8)) {
        return false;
    }
});





		// check email
		var r = /^([a-z0-9_\.-])+@[a-z0-9-]+\.([a-z]{2,4}\.)?[a-z]{2,4}$/i;
		var mailInput;
		var mailFlag = 1;
		var isEmpty = false;

		function checkMail(elThis) {
				mailInput = elThis.val();

				if (!r.test(mailInput)) {
						isEmpty = false;
						elThis.addClass('mail-error');

				} else {
						isEmpty = true;
						elThis.removeClass('mail-error')
				}
		}

		$('.check-mail').on('keyup', function () {
				checkMail($(this));

				if (mailInput.length == 0) {
						$(this).removeClass('mail-error')
				}
		});
		// check email

		// check require

		$('.btn-send').on('click', function (e) {
		
				isEmpty = false;

				checkMail($(this).parents('.form').find('.check-mail'));

				$(this).parents('.form').find('.require').each(function () {

						if ($(this).attr('type') == 'checkbox') {
								if (!$(this).is(':checked')) {
										$(this).parent().addClass('input-error');
										isEmpty = true;
								}
						}
						
						if ($(this).is('.style-select')) {

								if ($(this).prev().attr('data-val') == 0) {

										$(this).prev().addClass('input-error');
										isEmpty = true;
								}
						}

						if ($(this).attr('type') == 'file') {
								$(this).next().addClass('input-error');
								isEmpty = true;
						}

						if (!$(this).val()) {
								isEmpty = true;
								$(this).addClass('input-error');
						}
				});

				setTimeout(function () {
						$('.input-error').removeClass('input-error');
				}, 3000);

				if (isEmpty == true) {
						e.preventDefault();
				};
		});

		// check require
$('.wpcf7-form-control-wrap').each(function () {
  let sizeVal = $(this).find('.wpcf7-form-control').attr('id');
  $(this).addClass(sizeVal);
});


document.addEventListener('wpcf7mailsent', function (event) {
  console.log('mail sent OK');
  // Stuff
  setTimeout(function () {
    $('.element-show').removeClass('show');
    $('.wpcf7-form').attr('data-status', 'init');
    $('.wpcf7-form').removeClass('sent invalid');
    $('.wpcf7-form').addClass('init');
    $('.wpcf7-form').reset();
  }, 1500);

}, false);

document.addEventListener('wpcf7invalid', function (event) {

  // Stuff
  setTimeout(function () {
    $('.wpcf7-form').attr('data-status', 'init');
    $('.wpcf7-form').removeClass('sent invalid');
    $('.wpcf7-form').addClass('init');
    $('.wpcf7-form').addClass('init');
  }, 1500);

}, false); 
// img cover start
$('.img-cover').each(function () {
  let imgSrc = $(this).find('img').attr('src');
  //console.log(imgSrc);
  $(this).css('background-image', 'url(' + imgSrc + ')');
});
// img cover file start
 // style input file start

let ObjfieldFile = $('.input-file');
let flagFileMulti;
let textChoise;
let sizeFile;
let nameFile;

function createNewFileContainer(textChoiseParam, flagFileMultiParam, hintParam){
		let fileContainer = $('<div class="file-input-item"><input class="input-file" type="file" data-flagM="'+flagFileMultiParam+'" accept=".jpg,.png"></div>')
		let noticeFile = $('<div class="notice-file notice-big-file"><em>Файл слишком большой</em><i></i></div>');
		let docorateFile = $('<div class="file-decorate"><span>'+textChoiseParam+'</span><i></i></div>');
		
		return fileContainer.append(docorateFile).append(noticeFile);
}

ObjfieldFile.each(function(){

		textChoise = $(this).data('textchoise') ? $(this).data('textchoise') :  'Загрузите изображение';
		flagFileMulti = $(this).data('multy') ?  $(this).data('multy') : 0;
		textHint = $(this).data('hint');

		$(this).replaceWith(createNewFileContainer(textChoise, flagFileMulti, textHint));

});



$('body').on('click', '.file-decorate', function () {

		let container = $(this).parents('.file-input-item');
		container.find('.input-file').trigger('click');
});

$('body').on('change', '.input-file', function () {
		nameFile = $(this).val().replace(/C:\\fakepath\\/i, '');
		let container = $(this).parents('.file-input-item');
		
		if(nameFile.length>0){
				sizeFile = this.files[0].size;
				if(sizeFile < 500000){
						container.find('span').text(nameFile);
						container.addClass('file-decorate-full');

						flagFileMulti = $(this).data('flagm');

						if (flagFileMulti == 1) {
								$(this).parents('.file-input-item').after(createNewFileContainer(textChoise,"1"));
						}
				}
				else{
					
					$(this).parents('.file-input-item').find('.notice-file').addClass('notice-file--show');

					setTimeout(function(){
						$('.notice-file').removeClass('notice-file--show');
					},3000);
				}
		}
});

$("body").on("click", ".file-decorate i", function (e) {
		e.stopPropagation();
		flagFileMulti = $(this).parents('.file-input-item').find('.input-file').data('flagm');
		let container = $(this).parents('.file-input-item');
		console.log(flagFileMulti);
		if (flagFileMulti == 1) {
				container.remove();
		}
		else{
				container.replaceWith(createNewFileContainer(textChoise,"0"));
		}
});
 // style input file end
// custom-select

$('.style-select').each(function () {
  const select = $(this);
  const selectedText = select.find('option:selected').text();
  const dataText = select.data('text') || selectedText;
  const dataClass = select.data('class') ?? '';

  let selectOptions = '';

  select.find('option').each(function (index, option) {
    selectOptions +=
      `<li
          data-index="${index}" 
          data-value="${$(option).val()}"
          ${$(this).attr('selected') ? 'class="hide-selected"' : ''}
          >
          ${$(option).text()}
        </li>`;
  });

  const customSelectBox = $(
    `<div class='custom-select ${dataClass}' >
        <span>${dataText}</span>
        <ul class='ln'>${selectOptions}</ul>
        <i></i>
      </div> `
  );

  select.before(customSelectBox).hide();
});

$('body').on('click', function (evt) {
  const target = $(evt.target);
  if (!target.closest('.custom-select').length) {
    $('.custom-select').removeClass('active');
  }
});


$(document).on('click', '.custom-select', function (e) {
  e.preventDefault();
  const currentSelect = $(this);
  $('.custom-select').not(currentSelect).removeClass('active');
  currentSelect.toggleClass('active');
});


$(document).on('click', '.custom-select li', function () {
  const li = $(this);
  const index = li.data('index');
  const parent = li.closest('.custom-select');
  const select = parent.next('.style-select');

  select.find('option').eq(index).prop('selected', true);
  parent.find('span').text(li.text());

  parent.find('li').removeClass('hide-selected');
  li.addClass('hide-selected');
});


// custom-select
const ajaxSearch = (searchVal) => {


  console.log("searchVal", searchVal)

  $.ajax({
    type: "GET",
    url: "https://base.panda-dev.ru/wp-json/search/all",
    data: { 'search': searchVal },
    success: generateContent,
    error: handleError
  });
}



const handleError = (error) => {
  console.error('Error occurred during AJAX request:', error);
  // Add error handling logic here, such as displaying an error message to the user
};


const generateContent = (result) => {
  mainBox.empty();
  const { news, blog, product, services } = result;
  appendContent(news, 'news', 'Новости');
  appendContent(blog, 'blog', 'Блог');
  appendContent(product, 'product', 'Продукты');
  appendContent(services, 'services', 'Услуги');
  mainBox.addClass('active');
  if (isEmptyRes(result)) {
    mainBox.append('<div class="empty-list">Список пуст</div>');
  }
}

const appendContent = (items, link, title) => {
  if (items.length > 0) {
    const html = `
      <div class="search-list-line">
        <h3><a href="${link}">${title}</a></h3>
        <ul class="ln">
          ${items.map(item => `<li><a href="${item.link}">${item.title}</a></li>`).join('')}
        </ul>
      </div>`;
    mainBox.append(html);
  }
}

const isEmptyRes = (result) => {
  return Object.values(result).every(items => items.length === 0);
}



let mainBox = $('.search-list');
const spinner = $('.spinner');
let mainSearch = $('.search');


let searchTimeId;

$('.search-input-ajax').on('keyup', function () {

  let searchVal = $(this).val();

  if (searchVal.length > 0) {

    spinner.addClass('active');

    clearTimeout(searchTimeId);
    searchTimeId = setTimeout(() => {

      ajaxSearch(searchVal);

      spinner.removeClass('active');
    }, 2000);
  } else {
    console.log("in empty")
    mainBox.removeClass('active');
  }
});

// Додавить крестик в каждой поиске
$('.search-input').on('keyup', function () {
  let $search = $(this).closest('.search');
  let searchVal = $(this).val();

  if (searchVal.length > 0) {
    $search.addClass('search-on');
  } else {
    $search.removeClass('search-on');
  };
});

$('.search-input').on('focus', function () {
  console.log('focus')

  let $search = $(this).closest('.search');
  $search.addClass('search-on');
  mainBox.addClass('active');
});
$('.search-input').on('blur', function () {
  console.log('blur')
  let $search = $(this).closest('.search');
  $search.removeClass('search-on');
  mainBox.removeClass('active');
})

// Додавить крестик в каждой поиске

mainSearch.on('click', '.close-btn', function () {
  let $search = $(this).closest('.search');
  $search.removeClass('search-on').find('.search-input').val('');
  mainBox.removeClass('active');
  setTimeout(function () {
    mainBox.empty();
  }, 2000);
});

$('.close-js').on('click', function () {
    $(this).parents('.element-show').removeClass('show');
});
$('.popup-overlay-js').on('click',function(e){
    $(this).parents('.element-show').removeClass('show');
});

$(document).on('keyup', (evt) => {
    if (evt.keyCode === 27) {
        $('.element-show').removeClass('show');
    }
});

$('body').on('click','.element-btn', function (e) {
    e.preventDefault();
    
    $('.element-show').removeClass('show');
    let activeIndex = $(this).attr('data-element');
  
    $('[data-element="' + activeIndex + '"].element-show').addClass('show');

    
});
$('.password-field').on('click','i',changeStatePass);
let visibility = true;
function changeStatePass(){

  console.log(visibility);

  let thisEl = $(this);

  let changePass = (el,type,bool) => {
    $('.password-field').find('input').attr('type',type);
    el.attr('data-visibility', bool);
    visibility = !visibility;
  }

  visibility ? changePass(thisEl,'text', visibility) : changePass(thisEl,'password', visibility)

}


$(window).on('load', function () {
  $('.preloader-popup').addClass('loaded');
});


var st = 0;
window.addEventListener('scroll', function (e) {

  st = $(this).scrollTop();

  if (st > 0) {
    $('header').addClass('stick');
  }
  else {
    $('header').removeClass('stick');
  }

});




// $(window).on('load',function(){
//   $('.preload').addClass('load');
//   setTimeout(function(){
//     $('.preload').addClass('hide');
//   },2000)
// });



/* animate label all form */
$('.input-box').each(function () {
  $(this).find('input, textarea').on('keyup', function () {
    let lengthInput = $(this).val().length;
    if (lengthInput > 0) {
      $(this).addClass('input-empty');
    }
    else {
      $(this).removeClass('input-empty');
    }
  })

});
/* animate label all form */

// video play rew

$('.video-btn').on('click', function () {
  $(this).hide();
  $(this).prev()[0].play();
});


/*servises*/

$('.services-item').mousemove(function (event) {

  let curX = (event.offsetX - 42);
  let curY = (event.offsetY - 42);

  $(this).find('.btn-item-plus').css({
    left: (curX) + 'px',
    top: (curY) + 'px'
  });
});
/*servises*/

/*faq*/
$('.faq-head').on('click', function () {
  $(this).parent().toggleClass('faq-item--active');
});
/*faq*/

/*sidebar*/
$('.sidebar-search-head').on('click', function () {
  $(this).parents('.sidebar-search-item').toggleClass('active');
});
/*sidebar*/


$('.sidebar-show-js').on('click', function () {
  $('.catalog-sidebar').toggleClass('active');
});
$('.close-sidebar').on('click', function () {
  $('.catalog-sidebar').removeClass('active');
});


$('.mouse-down-btn-js').on('click', function () {
  $('html, body').animate({ scrollTop: $('.main-home').height() + 'px' }, 'slow');
});


$('.tabs-sticky').on('click', 'li', function () {
  let index = $(this).index() + 1;
  console.log(index)
  $('html, body').animate({ scrollTop: $('.tabs-point-' + index).offset().top - 130 + 'px' }, 'slow');
});
let detailTabs = $('.tabs');
if(detailTabs.length > 0){
  const onHoverMoveCarriage = function(num){
    let widthCarriage = detailTabs.find('li').eq(num).width();
    let offsestLeftCarriage = detailTabs.find('li').eq(num).position().left;
    $('.tabs-carriage').css({width: widthCarriage+'px', left: offsestLeftCarriage+'px'});
  }
  let timeOutId;
  let curretTabs = 0;
  let timeReturn = 500;

  detailTabs.find('li').hover(
  function(){

    clearInterval(timeOutId)
    onHoverMoveCarriage($(this).index());

  
  },function(){

    timeOutId = setTimeout(function(){
      onHoverMoveCarriage(curretTabs);
    }, timeReturn);
  });

  detailTabs.find('li').on('click',function(){
    
    curretTabs = $(this).index();
    detailTabs.find('li').removeClass('active').eq(curretTabs).addClass('active');
    onHoverMoveCarriage(curretTabs);

    $('.tabs-item').removeClass('active').eq(curretTabs).addClass('active');
  });

  onHoverMoveCarriage(0);

}
let commetsStarBlock = $('.comments-stars');

commetsStarBlock.on('click', '.stars-ico', function () {
  // console.log('cl', $(this).index());

  commetsStarBlock.find('.stars-ico').removeClass('active');
  let numRating = $(this).data('index');

  commetsStarBlock.find('.stars-ico').slice(0, numRating).addClass('active');
  console.log(numRating, commetsStarBlock.find('.stars-ico').slice(0, numRating))
  $(this).find('input').prop('checked', true);
}); 
});
//# sourceMappingURL=common-dist.js.map