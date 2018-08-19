/**
 * Flash Messages
 * @see https://developer.mozilla.org/en-US/docs/Web/API/Web_Animations_API/Using_the_Web_Animations_API
 */

let messages = document.querySelectorAll('.flash-message');
messages = Array.from(messages);

setTimeout( function() {
    messages.forEach(message => {
        message
            .animate(
                messageLeaving,
                messageAnimationTiming
            )
            .onfinish = function() {
                message.style.display = 'none';
            }
    });
}, 4000);

const messageLeaving = [
    { transform: 'translateX(0)' },
    { transform: 'translateX(-200%)' }
];

const messageAnimationTiming = {
    duration: 600,
    fill: 'both'
}
