import {createSelect} from '../custom-select/custom-select';
import {axios} from "../../index";

const $occupant = document.querySelector('.occupant');

if ($occupant) {
    occupantHandler($occupant);
}

function occupantHandler($wrapper) {
    const networkOptions = [{
        value: 1, name: `Вконтакте`
    }, {
        value: 2, name: `Instagram`
    }, {
        value: 3, name: `Одноклассники`
    }, {
        value: 4, name: `Facebook`
    },];
    const $inputsWrapper = $wrapper.querySelector('.occupant__inputs');
    const $rowTemplate = $wrapper.querySelector('.input-item-template');
    const $moreButton = $wrapper.querySelector('.occupant__button-more');
    const $saveButton = $wrapper.querySelector('.occupant__button--save');
    const orcId = $wrapper.dataset.orcId;

    init();

    function init() {
        addEventListener();

        createRow('Наприклад: окупант');
        createRow('Наприклад: дівчина ворога');
        createRow('Наприклад: мама');
    }

    function addEventListener() {
        $moreButton.addEventListener('click', () => {
            createRow('Коментар');
        });

        $saveButton.addEventListener('click', () => {

            const $items = $wrapper.querySelectorAll('.occupant__input-item');
            const sendObject = [];

            $items.forEach(($item) => {
                const link = $item.querySelector('[data-orc-link]').value;
                const comment = $item.querySelector('[data-orc-comment]').value;

                if (link !== '') {

                    sendObject.push({
                        net: 0,
                        link,
                        comment
                    });
                }
            });

            if (sendObject.length === 0) {
                return;
            }

            axios.post(`/occupant/item/${orcId}/add-data`, {data: sendObject})
                .then((response) => {
                    window.location.href = '/occupant/find';
                })
                .catch((error) => {
                    alert(error);
                });
        });
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
