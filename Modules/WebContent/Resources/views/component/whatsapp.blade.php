<style>
    #whatsapp-icon {
        position: fixed;
        bottom: 15px;
        right: 50px;
        font-size: 40px;
        /* background-color: #25D366; */
        border-radius: 50%;
        padding: 10px;
        color: white;
        cursor: pointer;
        z-index: 1000;
        width: 50px;
        height: 50px;
        text-align: center;
        line-height: 60px;
      }
      #whatsapp-icon i {
        top: 5px;
        position: absolute;
        left: 8px;
      }
      @media screen and (max-width: 767px) {
        #whatsapp-icon {
            bottom: 15px !important;
            right: 25px !important;
            font-size: 30px !important;
            width: 70px !important;
            height: 70px !important;
        }
        #whatsapp-icon i {
            top: 9px !important;
            left: 11px !important;
          }
      }
    </style>


{{-- sendWhatsapp --}}
<div id="whatsapp-icon" style="height: 70px; width: 70px;"  onclick="sendWhatsapp()">
    <img src="{{asset('theme-admin/volgh/assets/images/icon/whatsapp.svg')}}" style="height: 60px; width: auto;" class="ml-1 mt-n5">
</div>


<script>
    function sendWhatsapp() {
            var phoneNumber = '+5491133703188';
            var message = encodeURIComponent('Hola! Quiero más información sobre...');
            window.open('https://wa.me/' + phoneNumber + '?text=' + message, '_blank');
        }
</script>

