'use strict';
var Forum = Forum || {};
Forum.comments = (function ($) {
    var initElements = function () {
            $commentsHolder = $('#comments_holder');
        },
        initEvents = function () {
            $commentsHolder.on({
                'click': toggleUserInfo
            });
        },
        toggleUserInfo = function (e) {
            var $elem = $(e.target);
            if ($elem.hasClass('comment__user')) {
                var $commentItem = $elem.closest('.comment__item');
                $commentItem.find('.comment__user-info').slideToggle('medium');
            }
        },
        init = function () {
            initElements();
            initEvents();
        },
        $commentsHolder;
    return {
        init: init
    }
}(jQuery));

$(document).ready(function () {
    Forum.comments.init();
});