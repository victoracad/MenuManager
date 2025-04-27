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
document.addEventListener("DOMContentLoaded", function() {
  const phoneMask = new Inputmask({
      mask: "(99)99999-9999",
      placeholder: "_",           // Pode mudar o caractere se quiser
      showMaskOnHover: false,      // Opcional: não mostrar a máscara quando o mouse passa
      showMaskOnFocus: true,       // Mostrar a máscara quando focar no input
      clearIncomplete: true,       // Limpa o campo se o usuário não completar tudo
  });
  phoneMask.mask(document.querySelector('.phone'));
});