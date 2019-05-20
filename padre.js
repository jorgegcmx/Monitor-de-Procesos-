
  Vue.component('tweet-component', {
    template: `
      <div>   
                <li class="list-group-item" >
                  <small></small>                     
                  <strong>{{tweet.Nombre}}</strong>
                  <br>
                  {{tweet.Granja}}
                </li>              
      </div> 
    `,
    props:['tweet']     
  });
  
 
 