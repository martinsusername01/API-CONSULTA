import "./bootstrap";
import $ from 'jquery'
import validate from 'jquery-validation'

const input = document.querySelectorAll("[data-input-cpf]");

if(input[0]!==undefined){
    input[0].addEventListener("keyup", formatarCPF);
}

function formatarCPF(e) {
    var v = e.target.value.replace(/\D/g, "");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d)/, "$1.$2");
    v = v.replace(/(\d{3})(\d{1,2})$/, "$1-$2");
    e.target.value = v;
}

$("[data-form-consult-cpf]").validate({
	rules: {
		cpf: {
			required: true,
            minlength: 14,
        }
		
	}, 
    messages:{
        cpf:{
            required: 'O preenchimento do campo é obrigatório.',
            minlength: 'O CPF deve conter 11 dígitos'
        }
    },
    submitHandler: function() {
        let cpf = $('[data-input-cpf]').val();
        let label = $('[data-label-invalid-cpf]')
        if(cpf == '111.111.111-11' || cpf == '123.123.123-12' || cpf == '222.222.222-22'){
            return true;
        }else{
            $(label).html('Este CPF não está disponível para consulta.')
            return false;
        }
        
    }
});

