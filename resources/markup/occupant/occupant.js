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

        createRow('Например: оккупант');
        createRow('Например: девушка врага');
        createRow('Например: мама');
    }

    function addEventListener() {
        $moreButton.addEventListener('click', () => {
            createRow('Комментарий');
        });

        $saveButton.addEventListener('click', () => {

            const $items = $wrapper.querySelectorAll('.occupant__input-item');
            const sendObject = [];

            $items.forEach(($item) => {
                const link = $item.querySelector('[data-orc-link]').value;
                const net = $item.querySelector('[data-orc-net]').value;
                const comment = $item.querySelector('[data-orc-comment]').value;

                if (link !== '') {
                    if (net !== 'default') {
                        sendObject.push({
                            link,
                            net,
                            comment
                        });
                    } else {
                        sendObject.push({
                            link,
                            comment
                        });
                    }
                }
            });

            if (sendObject.length === 0) {
                return;
            }

            axios.post(`/occupant/item/${orcId}/add-data`, {data: sendObject})
                .then((response) => {
                    console.log(response);
                })
                .catch((error) => {
                    alert(error);
                });
        });
    }


    function createRow(commentPlaceholder) {
        const $clone = document.importNode($rowTemplate.content, true);
        const $select = $clone.querySelector('select');
        const $comment = $clone.querySelector('.occupant__input-item-inner--comment');
        const $commentInputPlaceholder = $comment.querySelector('input');
        const $commentTextPlaceholder = $comment.querySelector('.placeholder__item');

        let select = new createSelect({
            placeholder: 'Социальная сеть', values: networkOptions, $select
        });

        $commentInputPlaceholder.placeholder = commentPlaceholder;
        $commentTextPlaceholder.innerText = commentPlaceholder;

        $inputsWrapper.appendChild($clone);
    }
}
