// Gives the document a title
function giveTitle(name) {
    document.getElementsByTagName("title")[0].innerHTML = name;
}

// Add to cart
$(document).ready(function () {
    $(".catalog-product").on("click", ".buy-button", function () {
        let catalogProduct = $(this).parents()[1]
        let quantity = $(catalogProduct).find(".quantity-field").val()
        let product = $(catalogProduct).find(".catalog-product-middle").find("h2").html()
        let cartUpdateData = {product: product, quantity: quantity}
        if (quantity >= 1) {
            $.post("backend/cart-update.php", cartUpdateData, function (data) {
                alert("Produktet er lagt til i handlekurven.")
                if (!$("#cart-quantity").length) $("#cart").append("<div id='cart-quantity'></div>")
                $("#cart-quantity").html(data)
                $(catalogProduct).find(".quantity-field").val(1)
            })
        }
    })
})

// Empty cart
$(document).ready(function () {
    $("#empty-cart").click(function () {
        $.post("backend/cart-empty.php")
        location.reload()
    })
})

//Checkout toggle
$(document).ready(function () {
    $(".checkout").click(function () {
        $("#checkout-page").toggle()
        $("#cart-content").toggle()
    })
})
$(document).ready(function () {
    $("#checkout-back").click(function () {
        $("#checkout-page").toggle()
        $("#cart-content").toggle()
    })
})

// Show orders
$(document).ready(function () {
    $("#orders-button").click(function () {
        let phone = $("#orders-phone").val()
        if (phone.length === 8) {
            $("#orders-input").toggle()
            let output = $("#orders-output")
            output.toggle()
            $.post("backend/get-orders.php", {phone: phone}, function (data) {
                output.append(data)
            })
        }
    })
})

// Contact - map
$(document).ready(function () {
    if ($(location).attr('href') === "http://localhost/Datashop/contact.php") {
        let map = L.map('map').setView([59.916963, 10.728069], 14);
        L.tileLayer('https://opencache.statkart.no/gatekeeper/gk/gk.open_gmaps?layers=topo4&zoom={z}&x={x}&y={y}', {
            attribution: "<a href='http://www.kartverket.no/'>Kartverket</a>"
        }).addTo(map);
        let home = L.marker([59.916963, 10.728069]).addTo(map); home.bindPopup("Datashop")
    }
})

// +/- buttons
function incrementValue(e) {
    e.preventDefault();
    let fieldName = $(e.target).data("field");
    let parent = $(e.target).closest("div");
    let currentVal = parseInt(parent.find("input[name=" + fieldName + "]").val(), 10);

    if (!isNaN(currentVal)) {
        parent.find("input[name=" + fieldName + "]").val(currentVal + 1);
    } else {
        parent.find("input[name=" + fieldName + "]").val(0);
    }
}

function decrementValue(e) {
    e.preventDefault();
    let fieldName = $(e.target).data("field");
    let parent = $(e.target).closest("div");
    let currentVal = parseInt(parent.find("input[name=" + fieldName + "]").val(), 10);

    if (!isNaN(currentVal) && currentVal > 1) {
        parent.find("input[name=" + fieldName + "]").val(currentVal - 1);
    } else {
        parent.find("input[name=" + fieldName + "]").val(1);
    }
}

$(document).ready(function () {
    $(".button-plus").click(function(e) {
        incrementValue(e);
    });
    $(".button-minus").click(function(e) {
        decrementValue(e);
    });
})