import './bootstrap';

import Inputmask from 'inputmask';

document.addEventListener("DOMContentLoaded", function(){
    //var priceMask = new Inputmask("99,99");
    const priceMask = new Inputmask({
        alias: "currency",
        radixPoint: ",",        // separador decimal
        groupSeparator: ".",    // separador de milhar
        autoGroup: true,
        digits: 2,
        digitsOptional: false,
        rightAlign: false,      // para alinhar à esquerda
        unmaskAsNumber: true,
        removeMaskOnSubmit: true,
        inputmode: "numeric"
      });
    priceMask.mask(document.querySelector('.price'));
})