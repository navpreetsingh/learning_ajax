function createRequest(){
  var request = null;
  try{
          request = new XMLHttpRequest();
      }catch (trymicrosoft){
        try{
            request = new ActiveXObject("Msxml2.XMLHttpRequest");
          }catch (othermicrosoft){
            try{
              request = new ActiveXObject("Microsoft.XMLHttp");
            }catch(failed){
              request = null;
            }
          }
        }
      
      if (request == null){
        alert("Error creating request object!");
      }else{
        return request;
      }
}

var request1 = createRequest();
var request2 = createRequest();

