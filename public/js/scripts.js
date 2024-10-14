const editar = () => {
   $(".btnEditar").on("click", function (e) {
      e.preventDefault();
      let id = $(this).data("id");
      $('input[name="id"]').val(id);
      let tr = $(this).closest("tr");
      $(tr).remove();
      preecherForm(id);

   });
};

const deletar = () => {
   $(".btnExcluir").on("click", function (e) {
      e.preventDefault();
      let id = $(this).data("id");
      notifications(true,"Funcionário excluído com sucesso!");
   });
};

const adicionar = () => {
   $(".addFuncionario").on("click", function (e) {
      e.preventDefault();
      
   });
};
const limparForm = () => {
   $('input[name="id"]').val("");
   $('input[name="nome"]').val("");
   $('input[name="email"]').val("");
   $('select[name="situacao"]').val("");
   $('input[name="admitido_em"]').val("");
}
const preecherForm = (id) => {
   const site_url = document.querySelector('meta[name="site_url"]').content;
   id = parseInt(id);
   let url = `${site_url}buscar?id=${id}`;
   $.ajax({
      type: "GET",
      url: url,
      dataType: "json",
      success: function (response) {
         notifications(response.status,response.msg);
         let data = response.data;
         $('input[name="id"]').val(data.id);
         $('input[name="nome"]').val(data.nome);
         $('input[name="email"]').val(data.email);
         $('select[name="situacao"]').val(data.situacao);
         $('input[name="admitido_em"]').val(data.admitido_em);
      },error: function (jqXHR, textStatus, errorThrown) {
         console.error("Erro na requisição: ", textStatus, errorThrown);
      }
   });
}


const formSubmit = () => {
   $("#formFuncionario").on("submit", function (e) {
      e.preventDefault();
      let form = $(this);
      let url = form.attr("action");

      let id = $('input[name="id"]').val();
      
      let nome = $('input[name="nome"]').val();
      let email = $('input[name="email"]').val();
      let situacao = $('select[name="situacao"]').val();
      let admissao = $('input[name="admitido_em"]').val();
      
      if(id){
         url = `${url}editar`;
      }else{
         url = `${url}adicionar`;
      }

      let data = {
         nome,
         email,
         situacao,
         admitido_em: admissao
      };
      if(id){
         data.id = id;
      }

      $.ajax({
         type: "POST",
         url: url,
         data: data,
         dataType: "json",
         success: function (response) {
            let data = response.data;
            data = JSON.parse(data);
            let spanClass = "";
            let spanTxt = "";

            if(data.situacao == "contratado"){
               spanClass = "badge text-bg-primary";
               spanTxt = "Contratado";
            }

            if(data.situacao == "demitido"){
               spanClass = "badge text-bg-danger";
               spanTxt = "Demitido";
            }

            if(data.situacao == "em_teste"){
               spanClass = "badge text-bg-info";
               spanTxt = "Em teste";
            }
            
            notifications(response.status,response.msg);
            let tr = `<tr>
                        <td>${data.id}</td>
                        <td>${data.nome}</td>
                        <td>${data.email}</td>
                        <td>
                           <span class="${spanClass}">${spanTxt}</span>
                        </td>
                        <td>${data.admitido_em}</td>
                        <td>${data.criado_em}</td>
                        <td>${data.ultima_atualizacao}</td>
                        <td>
                           <button data-bs-toggle="modal" data-bs-target="#modalFormularioFuncionario" class="btn btn-primary btnEditar" data-id="${id}"><i class="fa-solid fa-pen-to-square"></i></button>
                           <button class="btn btn-danger btnExcluir" data-id="${id}"><i class="fa-solid fa-trash"></i></button>
                        </td>
                     </tr>`;

           
                  $("table tbody").append(tr);
                  limparForm();
         },
      });
   });
};

const notifications = (status,mensagem) => {
   const Toast = Swal.mixin({
      toast: true,
      position: "top-end",
      showConfirmButton: false,
      timer: 3000,
      timerProgressBar: true,
      didOpen: (toast) => {
        toast.onmouseenter = Swal.stopTimer;
        toast.onmouseleave = Swal.resumeTimer;
      }
    });
    Toast.fire({
      icon: status ? "success" : "error",
      title: mensagem,
    });

      return true;
}


const init = () => {
   editar();
   deletar();
   adicionar();
   formSubmit();
};

init();