import { extend } from 'vee-validate';

import { required,integer } from 'vee-validate/dist/rules';
   
   const Required = extend('required', {
      ...required,
      message: 'ce champs est obligatoire'
    });

    const Integer = extend('integer', {
      ...integer,
      message: 'ce champs est un entier'
    });

    export default {
        Required,
        Integer
    }