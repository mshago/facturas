<template>
  <!-- Componente con la tarjeta para consultar la factura -->
  <div class="container">
    <div v-if="bills.length<1" class="col-lg-8 col-md-6 ml-auto mr-auto">
      <div class="card">
        <div class="card-header">
          <h5 class="header text-center">Consulta tu factura</h5>
        </div>
        <div class="card-body">
          <form @submit.prevent="getBills">
            <div class="form-group">
              <label for>Sociedad Emisora *</label>
              <select v-model="form.company_id" class="form-control" name id style="height: calc(2.25rem + 10px)" required>
                <option value disabled selected hidden>Seleccione una sociedad emisora</option>
                <option
                  v-for="company in companies"
                  :value="company.id"
                  v-bind:key="company.id"
                >{{company.name}}</option>
              </select>
            </div>
            <div class="form-group">
              <label for>RFC *</label>
              <input v-model="form.rfc" type="text" class="form-control" placeholder="Ingrese su RFC" required maxlength="12"/>
            </div>
            <div class="form-group">
              <label for>Razón social *</label>
              <input v-model="form.social_reason" type="text" class="form-control" placeholder="Ingrese una razón social" required maxlength="255"/>
            </div>
            <div class="form-group">
              <label for>Folio</label>
              <input v-model="form.folio" type="text" class="form-control" placeholder="Ingrese el folio de la factura" maxlength="10" />
            </div>
            <div class="form-group text-center">
              <button type="submit" class="btn btn-warning">Consultar factura</button>
            </div>
          </form>
        </div>
      </div>
    </div>
    <div v-else class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">Facturas</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-right">
                                <button @click="reset" class="btn btn-sm btn-primary">Nueva consulta</button>
                    </div>
                    <div class="col-12">
                    </div>

                <table class="table">
                    <thead>
                        <tr>
                            <th>Folio</th>
                            <th>Razón social</th>
                            <th>RFC receptor</th>
                            <th>Archivos</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="bill in bills" :key="bill.id">
                            <td>{{bill.folio}}</td>
                            <td>{{bill.social_reason}}</td>
                            <td>{{bill.rfc}}</td>
                            <td>
                              <div v-for="file in files" :key="file.id">
                                <a v-if="bill.id==file.bill_id" target="_blank" v-bind:href="'storage/'+file.file.replace('public/', '')">Archivo</a>
                              </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {},
  created: function () {
    this.getCompanies();
    $(document).ready(function () {
      demo.checkFullPageBackgroundImage();
    });
  },
  data: function () {
    return {
        form:{
            company_id: "",
            rfc: "",
            social_reason: "",
            folio: ""
        },
        bills: [],
        companies: [],
        files: [],
    };
  },
  methods: {
    getCompanies: function () {
      var that = this;
      axios.get("/api/companies").then(function (response) {
        that.companies = response.data;
      });
    },
    getBills: function () {
        var that = this;
        axios.post("/api/bills",this.form).then(function (response) {
            that.bills = response.data;
            if(that.bills.length<1){
                var notify = $.notify("No hay facturas que coincidan con los datos ingresados", {
                    type: "warning",
                    allow_dismiss: true,
                });
            }else{
              that.getFiles();
            }
        });
    },
    getFiles: function(){
      var that = this;
      axios.get("/api/files").then(function (response) {
        that.files = response.data;
        console.log(response.data);
      });
    },
    reset: function(){
        this.bills = null;
    }
  },
};
</script>
