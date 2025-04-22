$(document).ready(function() {

    // Handle slot click for reservation
    $("#leftpanel .contain").on("click", ".slot", function() {
        var slotId = $(this).attr("id");
        
        // Check if slot is already booked
        if ($(this).hasClass("booked")) {
            alert("This slot is already booked.");
            return;
        }

        // Show the reservation details for the selected slot
        $("#rightpanel .slot-result").hide();
        $("#rightpanel #slot" + slotId + "-result").show();
        
        // Click on close reservation to mark the slot as booked
        $("#rightpanel #slot" + slotId + "-result button#close").click(function() {
            var $slot = $("#leftpanel #" + slotId);
            if ($slot.hasClass("booked")) {
                alert("This slot is already booked.");
                return;
            }

            // Mark the slot as booked
            $slot.addClass("booked");
            $slot.append("<p>Booked</p>");
            
            // Hide the reservation details
            $("#rightpanel #slot" + slotId + "-result").hide();
        });
    });

});

