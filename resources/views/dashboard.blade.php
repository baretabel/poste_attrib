
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <input type="date" name="date" value="{{$date}}"    id="date">
            <select name="ordi" id="ordi" >
            @foreach ($ordis as $ordi)
                    <option value="{{$ordi->id}}">{{$ordi->nom}}</option>
            @endforeach
            </select>
        
        
        </h2>
    </x-slot>

    <div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div id="flash"></div>
                
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex ">
                        <img src="{{asset('image/cheveron-left.svg')}}" alt=""  id="previous"class="flex-auto panel-icon" style="max-width: 30px">
                        <img src="{{asset('image/cheveron-right.svg')}}" alt="" id="next" class="flex-auto panel-icon" style="max-width: 30px">
                        <img src="{{asset('image/add-outline.svg')}}" alt=""  id="add_poste"class="flex-auto " style="max-width: 20px">
                        
                        
                      </div>
                      
                      <div>
    
                        <table class="table-auto">
                           
                        <th>{{$poste->nom}}<input type="hidden" id="poste_id" value="{{$poste->id}}"></th>
                            
                            <tr><td>8h</td><td><button class="attribution_boutton"value="8h">attribuer</button></td></tr>
                            <tr><td>9h</td><td><button class="attribution_boutton"value="9h">attribuer</button></td></tr>
                            <tr><td>10h</td><td><button class="attribution_boutton"value="10h">attribuer</button></td></tr>
                            <tr><td>11h</td><td><button class="attribution_boutton"value="11h">attribuer</button></td></tr>
                            <tr><td>13h</td><td><button class="attribution_boutton"value="13h">attribuer</button></td></tr>
                            <tr><td>14h</td><td><button class="attribution_boutton"value="14h">attribuer</button></td></tr>
                            <tr><td>15h</td><td><button class="attribution_boutton"value="15h">attribuer</button></td></tr>
                            <tr><td>16h</td><td><button class="attribution_boutton"value="16h">attribuer</button></td></tr>
                            
                        </table>
                    </div>
                    <div id="pcmodal" class="inv" >
                        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 ">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                
                              <div class="fixed inset-0 transition-opacity">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                              </div>
                            
                              <!-- This element is to trick the browser into centering the modal contents. -->
                              <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                            
                              <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <form>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex ">
                                  
                                        <h2>Ajouter Ordinateur</h2>
                                        
                                    </div>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                  <div class="">
                                        <div class="mb-4">
                                            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                                            
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom_pc" placeholder="Nom" >
                                            
                                        </div>
                                        
                                  </div>
                                </div>
                            
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                      <button id="v_poste" type="button" class="inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Valider
                                      </button>
                                    </span>
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        
                                      <button id="f_poste" type="button" class="bg-red-800 inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-red-600 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Annuler
                                      </button>
                                    </span>
                                    </form>
                                  </div>
                                  
                              </div>
                            </div>
                          </div>
                    </div>

                    <div id="attribution_modal" class="inv" >
                        <div class="fixed z-10 inset-0 overflow-y-auto ease-out duration-400 ">
                            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                                
                              <div class="fixed inset-0 transition-opacity">
                                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                              </div>
                            
                              <!-- This element is to trick the browser into centering the modal contents. -->
                              <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>​
                            
                              <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
                                <form>
                                    <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex ">
                                  
                                        <h2>Attribuer Ordinateur</h2>
                                        
                                    </div>
                                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                    <input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">
                                    <input type="hidden" id="user_id" value="">
                                    <input type="hidden" id="heure" value="">
                                    <div id="attrib_user"class="">
                                        <div class="mb-4 flex">
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="auto" placeholder="Prénom" >
                                            <img src="{{asset('image/add-outline.svg')}}" alt="nouveau client" id="change_div" srcset="" style="max-width: 20px">
                                        </div>
                                        <script type="text/javascript">
                                            var path = "/data/";
                                            $('#auto').autocomplete({
        select: function (event, ui) {//trigger when you click on the autocomplete item
            event.preventDefault();//you can prevent the default event
            $('#user_id').val( ui.item.value);//employee id
            $('#auto').val( ui.item.label);

        },
        source: function(request, response) {
            $.ajax({
                url: '/data/',
                dataType: "json",
                data: {
                    term : request.term
                },
                success: function(data) {
                    response(data);

                }
            });
        },
        minLength: 1,

    });
                                        </script>
                                        
                                  </div>
                                  <div id="add_user"class="inv">
                                    <div class="mb-4">
                                        <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="prenom_client" placeholder="Prénom" >
                                         
                                     </div>
                                        <div class="mb-4">
                                            
                                            
                                            <input type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nom_client" placeholder="Nom" >
                                            
                                        </div>
                                       
                                        
                                  </div>
                                </div>
                            
                                <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                    <span class="flex w-full rounded-md shadow-sm sm:ml-3 sm:w-auto">
                                      <button id="v_attrib" type="button" class="inv inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Valider
                                      </button>
                                      <button id="valid" type="button" class=" inline-flex justify-center w-full rounded-md border border-transparent px-4 py-2 bg-green-600 text-base leading-6 font-medium text-white shadow-sm hover:bg-green-500 focus:outline-none focus:border-green-700 focus:shadow-outline-green transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Valider
                                      </button>
                                    </span>
                                    
                                    <span class="mt-3 flex w-full rounded-md shadow-sm sm:mt-0 sm:w-auto">
                                        
                                      <button id="f_attrib" type="button" class="bg-red-800 inline-flex justify-center w-full rounded-md border border-gray-300 px-4 py-2 bg-red-600 text-base leading-6 font-medium text-gray-700 shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue transition ease-in-out duration-150 sm:text-sm sm:leading-5">
                                        Annuler
                                      </button>
                                    </span>
                                    </form>
                                  </div>
                                  
                              </div>
                            </div>
                          </div>
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script></script>