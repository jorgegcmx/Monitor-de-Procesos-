<?php

include_once 'header.php';

?>  
    <div id="main" class="container">
        <div class="row">
            <div class="col-sm-12">                
                <div class="table-responsive">    
                    <granja></granja>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
    <script src="https://unpkg.com/vuex@3.1.1/dist/vuex.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.18.0/axios.min.js"></script>
    <script type="text/javascript">
      
       Vue.component('granja', {
            template://html
                `
                <div>
                     <ul class="list-group">
                     <li class="list-group-item" v-for="(item,key,index) in granjas" :key="item.Granja">
                       <b>{{item.Nombre}}</b>                       
                        <casetas :id="item.Granja"></casetas>                     
                     </li>
                    </ul>
                </div>            
                `,
                mounted() {
                this.getGranjas();
            },
            data() {
                return {
                    granjas: []
                }
            },
            methods: {
                getGranjas: function () {
                    axios.get('http://localhost:8000/Granjas/').then(response => {
                        this.granjas = response.data;
                    }).catch(function (error) {
                        console.log(error);
                    });
                }
            }

        })
        Vue.component('casetas', {
                template://html
                    `
                <div>
                   <button v-on:click="getCasetas" type="button" class="btn btn-info" >Show</button>
                   <button v-on:click="cleard" type="button" class="btn btn-danger" >X</button>
                     <div v-for="(itemm,key,index) in casetas" :key="key" >                   
                     <table class="table">
                     <thead class="thead-dark">
                     <tr>
                     <th>IDCaseta</th>
                     <th>Modulo</th>
                     <th>Caseta</th>
                     <th>Almacen</th>
                     <th>Articulo</th>
                     <th>Cantidad</th>
                     <th>Costo Unitario</th>
                     <th>Descripción</th>
                     <th>Proyecto</th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                     <td>{{itemm.NumIDCaseta}}</td>
                     <td>{{itemm.Modulo}}</td>
                     <td>{{itemm.Caseta}}</td>
                     <td>{{itemm.SiteID}}</td>
                     <td>{{itemm.InvtID}}</td>
                     <td>{{itemm.QtyAvail}}</td>
                     <td>{{itemm.AvgCost}}</td>
                     <td>{{itemm.Descr}}</td>
                     <td>{{itemm.Proyecto}}</td>
                     </tr>
                     </tbody>
                     </table>                     
                    </div>
                </div>            
                `,
                props: ['id']
                ,
                 mounted() {
                   // this.getCasetas();
                },
                data() {
                    return {
                        casetas: []
                    }
                },
                methods: {
                    getCasetas: function () {
                        axios.get(`http://localhost:8000/Casetas/${this.id}`).then(response => {
                            this.casetas = response.data;
                            //console.log(this.casetas);
                        }).catch(function (error) {
                            console.log(error);
                        });
                    },
                    cleard: function () {
                        axios.get(`http://localhost:8000/Casetas/0`).then(response => {
                            this.casetas = response.data;
                           
                        }).catch(function (error) {
                            console.log(error);
                        });
                    }

                }
            })

      new Vue({
        el: "#main"     
      });

     
    </script>
  </body>
</html>