const editar = () => {
   $(".btnEditar").on("click", function (e) {
      e.preventDefault();
      let id = $(this).data("id");
      alert("Editar el registro con el id: " + id);
   });
};

const deletar = () => {
   $(".btnExcluir").on("click", function (e) {
      e.preventDefault();
      let id = $(this).data("id");
      alert("btnExcluir el registro con el id: " + id);
   });
};

const adicionar = () => {
   $(".addFuncionario").on("click", function (e) {
      e.preventDefault();
      alert("Adicionar un nuevo registro");
   });
};



 function init() {
   editar();
   deletar();
   adicionar();
}

init();