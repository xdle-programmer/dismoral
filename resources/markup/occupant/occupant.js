import {createSelect} from '../custom-select/custom-select';


const listOptions = [
    {
        value: 1,
        name: `Одноклассники`
    },
    {
        value: 2,
        name: `Вконтакте`
    },
    {
        value: 3,
        name: `Instagram`
    },
    {
        value: 4,
        name: `Facebook`
    },
];

let select = new createSelect({
    placeholder: 'Социальная сеть',
    values: listOptions,
    $select: document.querySelector('#zzz')
});
