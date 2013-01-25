/*
 * jQuery.liveSlider
 * Plugin for jQuery 1.2.3+
 * Version: 0.4
 * Copyright (c) 2011 Eugene Chusov. All rights reserved.
 * Released under the GNU/GPL license: http://www.gnu.org/copyleft/gpl.html
 * More info at http://chusov.ru/slider
 * Designed and developed by Eugene Chusov <eugene@chusov.ru>

 * ENG
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.

 * RUS
 * Эта программа является свободным программным обеспечением. Вы можете
 * распространять и/или модифицировать её согласно условиям Стандартной
 * Общественной Лицензии GNU, опубликованной Фондом Свободного Программного
 * Обеспечения, версии 3 или, по Вашему желанию, любой более поздней версии.
 * Эта программа распространяется в надежде, что она будет полезной, но БЕЗ
 * ВСЯКИХ ГАРАНТИЙ, в том числе подразумеваемых гарантий ТОВАРНОГО СОСТОЯНИЯ ПРИ
 * ПРОДАЖЕ и ГОДНОСТИ ДЛЯ ОПРЕДЕЛЁННОГО ПРИМЕНЕНИЯ. Смотрите Стандартную
 * Общественную Лицензию GNU для получения дополнительной информации.
 */
(function($){
	var pluginClass = function($object){

		var $this = this;

		var $inner;

		var innerWidth;
		var elementWidth, elementHeight;

        var settings = {

            textOpenHeight: 130,
            textCloseHeight: 30,
            textOpacity: 0.7,
            textOpened: false,

            slideshow: false,
            slideshowPeriod: 4000,
            slidebycenter: false,

            navigator: true,
            infinityNavigator: true
        };

        var $currentDiv;
        var $textInner;
        var $textBlock;
        var textOpened = false;
        var textBusy = false;
        var textData = [];
        var navigator;
        var blocker;
        var elementCount = 0;
        var slideshow;
        $this.init = function(options){

            $.extend(settings, options);
            $object
                .css('overflow', 'hidden')
                .css('position', 'relative');

            $inner = $('<div class="inner" style="position:relative"></div>');

            innerWidth = 0;
            elementWidth = $object.width();
            elementHeight = $object.height();
            $('> div, > img', $object).each(function(index){

                var number = index+1;
                var $element = $(this);
                var $div = $('<div class="slide slide_' + number + '" style="float:left; position:relative; padding: 0px; margin: 0px"></div>');

                $element.css('margin', '0px');
                $element.width(elementWidth);

                $div.append($element);
                $inner.append($div);
                if( index == 0 ){
                    $div.addClass('slide_first');
                    $currentDiv = $div;
                }
                $div.data('index', index);

                innerWidth += elementWidth;
                elementCount++;
            });

            $('div.slide:last', $inner).addClass('slide_last');

            $inner.width(innerWidth);
            $object.empty().append($inner);
            if( settings.slidebycenter ){
                blocker = standartBlocker;
                blocker.init();
            }
            if( settings.navigator ){
                navigator = settings.infinityNavigator ? infinityNavigator : standartNavigator;
                navigator.init();
            }
            slideshow = standartSlideshow;
            slideshow.init();

            if( settings.slideshow ){
                slideshow.play();
            }
            textblock = standartTextblock;
            textblock.init();
        }

        var standartTextblock = {
            init: function(){
                abstractTextblock.init();
            }
        }

        var abstractTextblock = {

            opened: false,
            $panel: null,
            $block: null,

            init: function(){
                $('div.slide', $inner).each(function(index){
                    var $element = $(this);
                    var $span = $('span.block', $element).eq(0);
                    $element.data('text', $span.length > 0 ? $span.html() : '');
                    $span.remove();
                });

                abstractTextblock.$inner = $('<div class="textInner"></div>');
                abstractTextblock.$panel = $('<div class="textPanel" style="position:absolute;height: 30px;bottom:0px;display:none"></div>');

                abstractTextblock.$panel
                    .append(abstractTextblock.$inner)
                    .width(elementWidth)
                    .height( settings.textOpenHeight + 'px')
                    .css('opacity', 0)
                    .click(abstractTextblock.toggle);

                if( settings.textOpened ){
                    abstractTextblock.$panel.addClass('textPanelOpened');
                    abstractTextblock.opened = true;
                } else{
                    abstractTextblock.$panel.css('bottom', '-' + (settings.textOpenHeight - settings.textCloseHeight) + 'px');
                }

                abstractTextblock.$inner.css('opacity', 0);
                abstractTextblock.slideFinished();

                $object.append(abstractTextblock.$panel);

                $object.bind('navigatorSlide', function(event, $slide){
                    abstractTextblock.slideStart($slide);
                });

                $object.bind('navigatorSlideFinished', function(event){
                    abstractTextblock.slideFinished();
                });
            },
            slideFinished: function(){

                var html = $currentDiv.data('text');

                if( html ){
                    if( abstractTextblock.$panel.css('opacity') == 0 ){

                        abstractTextblock.$inner
                            .stop()
                            .html(html)
                            .show()
                            .css('opacity', 1);

                        abstractTextblock.$panel.stop().show().css('opacity', settings.textOpacity);

                    }
                    else {
                        abstractTextblock.$inner.html(html);
                        abstractTextblock.$inner.animate({'opacity': 1}, 150);
                    }
                }
            },

            slideStart: function(nextSlide){
                var html = $(nextSlide).data('text');

                if(html){

                    if( abstractTextblock.$panel.css('opacity') == 0 ){

                        abstractTextblock.$panel.show();

                        abstractTextblock.$inner
                            .stop()
                            .html(html)
                            .show()
                            .css('opacity', 1);

                        abstractTextblock.$panel.animate({'opacity': settings.textOpacity}, 300);

                    } else {
                        abstractTextblock.$inner.animate({'opacity':0}, 300);
                    }

                } else {
                    abstractTextblock.$panel.animate({'opacity': 0}, 300, function(){
                        abstractTextblock.$panel.hide();
                    });
                }
            },

            toggle: function(){

                if( abstractTextblock.blocked ){
                    return false;
                }
                if( abstractTextblock.opened ){

                    abstractTextblock.opened = false;

                    abstractTextblock.$panel
                        .stop()
                        .animate({bottom: '-' + (settings.textOpenHeight - settings.textCloseHeight) + 'px'}, 200, function(){
                            abstractTextblock.blocked = false;
                        });
                    abstractTextblock.$panel.removeClass('textPanelOpened');
                }
                else {
                    abstractTextblock.opened = true;
                    abstractTextblock.$panel
                        .stop()
                        .animate({bottom: '0px'}, 200, function(){
                            abstractTextblock.blocked = false;
                        });
                    abstractTextblock.$panel.addClass('textPanelOpened');
                }
            }
        }

        var standartBlocker = {
            init: function(){
                abstractBlocker.init();
            }
        }

        var abstractBlocker = {
            init: function(){

                var $blocker = $('<div style="position: absolute; margin: 0px; padding: 0px; cursor: pointer"></div>');

                $blocker
                    .width(elementWidth)
                    .height(elementHeight);

                $blocker.click(function(){
                    navigator.next()
                });

                $object.append($blocker);
            }
        }


        /**
         * Slideshow module
         */

        $this.play = function(){
            slideshow.play();
        }

        $this.stop = function(){
            slideshow.stop();
        }

        var standartSlideshow = {
            init: function(){
                abstractSlideshow.init();
            },
            toggle: function(){
                abstractSlideshow.toggle();
            },
            play: function(){
                abstractSlideshow.play();
            },
            stop: function(){
                abstractSlideshow.stop();
            }
        }

        var abstractSlideshow = {

            run: false,
            intervalInit: false,
            $button: null,

            init: function(){

                abstractSlideshow.$button = $('<div class="slideshowStop" style="position:absolute;"></div>');
                abstractSlideshow.$button.css('opacity',0.5);

                abstractSlideshow.$button.hover(
                    function(){ abstractSlideshow.$button.css('opacity',1) },
                    function(){ abstractSlideshow.$button.css('opacity',0.5) }
                );

                $object.append(abstractSlideshow.$button);
                abstractSlideshow.$button.click(function(event){
                    event.stopPropagation();
                    slideshow.toggle();
                });
            },
            intervalAction: function(){
                if( abstractSlideshow.run ){
                    navigator.next();
                }
            },

            play: function(){

                if( !abstractSlideshow.intervalInit ){
                    abstractSlideshow.intervalInit = true;
                    setInterval(abstractSlideshow.intervalAction, settings.slideshowPeriod);
                }

                abstractSlideshow.run = true;
                abstractSlideshow.$button.addClass('slideshowPlay');
            },

            stop: function(){
                abstractSlideshow.run = false;
                abstractSlideshow.$button.removeClass('slideshowPlay');
            },

            toggle: function(){
                abstractSlideshow.run ? slideshow.stop() : slideshow.play();
            }
        }

		$this.moveNext = function(){
		    navigator.next();
		}

		$this.movePrev = function(){
		    navigator.prev();
		}

		$this.moveTo = function(index){
		    navigator.to(index);
		}
		var standartNavigator = {

            init: function(){
                abstractNavigator.init();
            },

		    next: function(){
                if( $currentDiv.hasClass('slide_last') ){
                    return abstractNavigator.to(1);
                }

                abstractNavigator.next();
            },

            prev: function(){
                if( $currentDiv.hasClass('slide_first') ){
                    return abstractNavigator.to(elementCount);
                }

                abstractNavigator.prev();
            },

            to: function(index){
                abstractNavigator.to(index);
            },

            initButtons: function(){

                if( $currentDiv.hasClass('slide_last') ){
                    abstractNavigator.$nextDiv.hasClass('imageNext') ? abstractNavigator.$nextDiv.removeClass('imageNext') : null;
                } else {
                    abstractNavigator.$nextDiv.hasClass('imageNext') ? null : abstractNavigator.$nextDiv.addClass('imageNext');
                }

                if( $currentDiv.hasClass('slide_first') ){
                    abstractNavigator.$prevDiv.hasClass('imagePrev') ? abstractNavigator.$prevDiv.removeClass('imagePrev') : null;
                } else {
                    abstractNavigator.$nextDiv.hasClass('imagePrev') ? null : abstractNavigator.$prevDiv.addClass('imagePrev');
                }
            }
		}

		var infinityNavigator = {

            init: function(){
                abstractNavigator.init();
            },

		    next: function(){
                abstractNavigator.next();
            },

            prev: function(){
                abstractNavigator.prev();
            },

            to: function(index){
                abstractNavigator.to(index);
            },

            initButtons: function(){
                abstractNavigator.$nextDiv.hasClass('imageNext') ? null : abstractNavigator.$nextDiv.addClass('imageNext');
                abstractNavigator.$nextDiv.hasClass('imagePrev') ? null : abstractNavigator.$prevDiv.addClass('imagePrev');
            }

		}

        var abstractNavigator = {

            $prevDiv: null,

            $nextDiv: null,

            blocked: false,

            init: function(){
                abstractNavigator.$prevDiv = $('<div class="prev" style="position:absolute;left:0px;cursor:pointer"></div>');

                abstractNavigator.$prevDiv
                    .width(elementWidth/5)
                    .height(elementHeight)
                    .css('opacity',0.5)
                    .click(navigator.prev)
                    .mouseover(function(){abstractNavigator.$prevDiv.css('opacity',0.9)})
                    .mouseout(function(){abstractNavigator.$prevDiv.css('opacity',0.4)});
                abstractNavigator.$nextDiv = $('<div class="next arrow" style="position:absolute;right:0px;cursor:pointer"></div>');

                abstractNavigator.$nextDiv
                    .width(elementWidth/5)
                    .height(elementHeight)
                    .css('opacity',0.7)
                    .click(navigator.next)
                    .mouseover(function(){abstractNavigator.$nextDiv.css('opacity',0.9)})
                    .mouseout(function(){abstractNavigator.$nextDiv.css('opacity',0.4)});

                $object.append(abstractNavigator.$prevDiv).append(abstractNavigator.$nextDiv);

                navigator.initButtons();
            },

            next: function(){

                if( abstractNavigator.blocked ){
                    return false;
                }

                var $nextDiv = $currentDiv.next('div.slide').eq(0);
                if( $nextDiv.length == 0 ){
                    $nextDiv = $('div.slide', $inner).eq(0);
                    $inner.append($nextDiv);
                    $inner.css('left', parseInt($inner.css('left')) + elementWidth );
                }

                $currentDiv = $nextDiv;
                navigator.initButtons();

                var endFunction = function(){
                    !settings.navigation || navigator.initButtons();
                    abstractNavigator.blocked = false;
                    $object.trigger('navigatorSlideFinished');
                }

                $inner.animate({left: '-=' + elementWidth + 'px'}, 300, endFunction);

                abstractNavigator.blocked = true;
                $object.trigger('navigatorSlide', $nextDiv);
            },

            prev: function(){

                if( abstractNavigator.blocked ){
                    return false;
                }

                var $nextDiv = $currentDiv.prev('div.slide').eq(0);

                if( $nextDiv.length == 0 ){
                    $nextDiv = $('div.slide:last', $inner);
                    $inner.css('left', parseInt($inner.css('left')) - elementWidth );
                    $inner.prepend($nextDiv);
                }

                $currentDiv = $nextDiv;
                navigator.initButtons();

                var endFunction = function(){
                    abstractNavigator.blocked = false;
                    !settings.navigation || navigator.initButtons();
                    $object.trigger('navigatorSlideFinished');
                }

                $inner.animate({left: '+=' + elementWidth + 'px'}, 300, endFunction);

                abstractNavigator.blocked = true;
                $object.trigger('navigatorSlide', $nextDiv);
            },
            to: function(index){

                if( abstractNavigator.blocked ){
                    return false;
                }

                var toPos = 0;
                var fromPos = 0;
                var $toPos = $('div.slide_' + index, $inner);

                $('div.slide', $inner).each(function(index){

                    var className = $(this).attr('class');

                    if( $currentDiv.attr('class') == className ){
                        fromPos = index;
                    }

                    if( $toPos.attr('class') == className ){
                        toPos = index;
                    }

                });

                var num = toPos - fromPos;

                var endFunction = function(){
                    abstractNavigator.blocked = false;
                    !settings.navigation || navigator.initButtons();
                    $object.trigger('navigatorSlideFinished');
                }

                $currentDiv = $toPos;
                $inner.animate({left: '-=' + (num * elementWidth) + 'px'}, 300, endFunction);

                abstractNavigator.blocked = true;
                navigator.initButtons();

                $object.trigger('navigatorSlide');
            }
        }

		return $this;
	}
    $.fn.liveSlider = function( method ){

        var args = arguments;
        return this.each(function(index){

            var $object = $(this);
			var plugin = $object.data('class');

			if( !plugin ){
				plugin = new pluginClass($object);
				$object.data('class', plugin);
			}
            if ( plugin[method] ) {
                plugin.__init || $.error( 'Run init method before: ' +  method );
                plugin[method](args[1]);
            } else if ( typeof method === 'object' || !method ) {
				plugin.__init = true;
                plugin.init(method);
            } else {
                $.error( 'Method ' +  method + ' does not exist on jQuery.funnyBox' );
            }
        });
    }

})(jQuery);