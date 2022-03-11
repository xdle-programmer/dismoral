import {axios} from "../../index";

const $occupantSend = document.querySelector('.occupant-send');

if ($occupantSend) {
    occupantSendHandler($occupantSend);
}

function occupantSendHandler($wrapper) {
    const $saveButton = $wrapper.querySelector('.occupant-send__button');
    const orcId = $wrapper.dataset.orcId;

    init();

    function init() {
        addEventListener();
    }

    function addEventListener() {
        $saveButton.addEventListener('click', () => {

            axios.post(`/occupant/item/${orcId}/check`)
                .then((response) => {
                    window.location.href = '/occupant/send';
                })
                .catch((error) => {
                    alert(error);
                });
        });
    }

}
