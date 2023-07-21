$.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});



window.onload = function(e){
    var url = window.location.href;

    if ((url.indexOf("/single/") != -1)) {

        $('#celendz').change(function (e){

            var idcelendz=this.value;

            if(idcelendz){

                $.ajax({
                    dataType:"json",
                    method:"post",
                    url:"vratiCenuTokena/" + idcelendz,
                    success:function(result) {

                        //alert(result.price);
                        $('#numberr').val(result.price)

                    },
                    error:function(xhr) {
                        alert('opa eror')
                    }

                });
            }
        })


        $('#posaljitoken').click(function (e) {

            var poruka=$('#poruka').val();
            var idlajv=$('#lajv').val();
            var idstrimer=$('#strimer').val();
            var iduser=$('#user').val();


            if(poruka.length<3){
                alert('Poruka mora biti veca od 3 karaktera');
            }
            var idcelendz=$('#celendz').val();

            var tokeni=$('#numberr').val();

            if(tokeni){
                if(tokeni<1 || tokeni>999999){
                    alert('Greska token');
                }
            }

            if(poruka.length>=3){

                if(tokeni>0 || !tokeni){
                $.ajax({
                    dataType:"json",
                    method:"post",
                    url:"doniraj",
                    data:{
                        poruka:poruka,
                        idlajv:idlajv,
                        idstrimer:idstrimer,
                        iduser:iduser,
                        idcelendz:idcelendz,
                        tokeni:tokeni
                    },
                    success:function(result) {
                        alert(result.porukauspeh);
                        IspisiTokene(result.stanjeUsera);
                        PrikazKomentara(result.comments);

                    },
                    error:function(xhr) {
                        console.log(xhr)
                    }
                });
                }
            }
        });

        function IspisiTokene(stanje){

           $("#tokensavail").text(stanje);

        }

        function PrikazKomentara(komentari){

            console.log(komentari);

            var html="";

            for(let k of komentari){
                html+=`<div class="media">

                            <div class="media-left">
                                <a>
                                    <h5 class="bojamoja">${k.username.username}</h5>
                                </a>
                            </div>
                            <div class="media-body">
                                <p> ${k.comment}</p> `

                                if(k.tokens!= null) {
                                    html+=`<p class="bojamoja"> ${k.tokens} tokena`;
                                }

                                if(k. nameChallenge!= null) {
                                    html+=` ~ ${k.nameChallenge.name_challenge} `;
                                }

                            html+=`

                            </div>
                        </div>`

            }

            $('#livechat').html(html);

        }
    }


    //


    if ((url.indexOf("/admins/activities") != -1)) {

        $('#filtriraj').click(function (e) {

            var datumod=$('#od').val();
            var datumdo=$('#do').val();

            if(!datumdo || !datumod) {
                alert('Niste odabrali oba datuma');
            }
            else{

                datumod=datumod + ' 00:00:01';
                datumdo=datumdo + ' 23:59:59';

                $.ajax({
                    dataType:"json",
                    method:"post",
                    url:"activities/filter",
                    data:{
                        datumod:datumod,
                        datumdo:datumdo,

                    },
                    success:function(result) {
                        IspisiAktivnosti(result.activities)


                    },
                    error:function(xhr) {
                        console.log(xhr)
                    }
                });
            }
        })


        function IspisiAktivnosti(activities){

            var html=`                <table class="table table-striped pbb2 pbb ">
                    <thead>
                    <tr>
                        <th>username</th>
                        <th>mejl</th>
                        <th>aktivnost</th>
                        <th>datum aktivnosti</th>
                    </tr>
                    </thead>


                    <tbody>`

            if(activities.length==0) html+=`<p class="fontsizemoj bojamoja"> Ne postoje aktivnosti za ove datume. </p>`
            for(let a of activities) {
                html+=`
                <tr>
                    <td>${a.username}</td>
                    <td>${a.email}</td>
                    <td>${a.activity}</td>
                    <td>${a.activity_at}</td>

                </tr> `
            }

            html+=`                    </tbody>


                </table>
            </div>`

            $('#ispisaktivnosti').html(html);

        }
    }

    //stranica admins korisnici

    if ((url.indexOf("/admins/usersadmins") != -1)) {

        $(document).on("click", ".menjanje", function(){
            var uloga= $(this).attr('trenutno');
            var idkor= $(this).attr('iduser');

            if(uloga==1 || uloga==2){
                $.ajax({
                    dataType:"json",
                    method:"post",
                    url:"changerole",
                    data:{
                        uloga:uloga,
                        idkor:idkor,
                    },
                    success:function(result) {
                        PregaziHtml(result.naziv, result.idkor, result.trenutno)

                    },
                    error:function(xhr) {
                        console.log(xhr)
                    }
                });
            }
        });

        function PregaziHtml(naziv, idkor, trenutno) {

            var html=naziv +` |`+ `
               <a class="bojamoja menjanje" iduser="`+ idkor + `" `+ 'trenutno' +`="`+ trenutno + `" >Promeni </a>`

            $('#role-' + idkor).html(html);

        }

        $(document).on("click", ".obrisiusera", function() {

            var id= $(this).attr('iduser');
            // alert(id);
            $.ajax({
                dataType:"json",
                method:"post",
                url:"deleteuser",
                data:{
                    id:id,
                },
                success:function(result) {
                    $('#red-'+result).remove();
                },
                error:function(xhr) {
                    console.log(xhr)
                }
            });


        });

    }

    /// gotova stranica admins korisnici

    if ((url.indexOf("/single") != -1)) {

            $('.zaprati').click(function () {

                var idStreamer=$(this).attr('idStreamer');
                var idUser=$(this).attr('idUser');
                var idStream=$(this).attr('idStream');


                $.ajax({
                    dataType:"json",
                    method:"post",
                    url:"follow",
                    data:{
                        idStreamer:idStreamer,
                        idUser:idUser,
                        idStream:idStream
                    },
                    success:function(result) {
                        $('#zaprati'+result.strim).text(result.poruka);
                        $('#pratioci'+result.strim).text(result.pratioci);
                    },
                    error:function(xhr) {
                        console.log(xhr)
                    }
                });
            });

    }







}
