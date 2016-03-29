/**
 * Created by Traxnet on 29/03/2016.
 * Store Affiliate Location
 */

    // Try W3C Geolocation
    if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(function(position) {

            //store user current location
            storeLocation(position.coords.latitude,position.coords.longitude);

        });
    }
    //broswer does not support Geolocation
    else{

        myApp.addNotification({
            title: 'Geolocation Error',
            message: 'Your browser does not support Geolocation or Your did not permit'
        });

    }

/**
 * store user current location
 */
function storeLocation(lati,longit){

    // CSRF protection
    $.ajaxSetup(
        {
            headers:
            {
                'X-CSRF-Token': $('meta[name="csrf-token"]').attr("content")
            }
        });

    $.ajax({
        url: 'store-location',
        type: 'POST',
        dataType: 'JSON',
        data:{latitude:lati,longitude:longit}

    });

}