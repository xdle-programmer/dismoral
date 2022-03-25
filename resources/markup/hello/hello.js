const $hello = document.querySelector('.hello')

if ($hello) {
    helloHandler($hello)
}

function helloHandler($wrapper) {
    const $template = $wrapper.querySelector('[data-hello-list-item-template]')
    const $items = $wrapper.querySelector('[data-hello-list-items]')

    const status = {
        notFind: {
            className: 'hello__list-item--not-find',
            text: 'Нужно найти',
        },
        notSend: {
            className: 'hello__list-item--not-send',
            text: 'Нужно написать',
        },
        done: {
            className: 'hello__list-item--done',
            text: 'Нашли и написали',
        },
    }




    function createRow(commentPlaceholder) {
        const $clone = document.importNode($rowTemplate.content, true);
        const $comment = $clone.querySelector('.occupant__input-item-inner--comment');
        const $commentInputPlaceholder = $comment.querySelector('input');
        const $commentTextPlaceholder = $comment.querySelector('.placeholder__item');

        $commentInputPlaceholder.placeholder = commentPlaceholder;
        $commentTextPlaceholder.innerText = commentPlaceholder;

        $inputsWrapper.appendChild($clone);
    }
}
