const value = document.querySelector('.total-price').innerHTML.split(' ')[1];

paypal
    .Buttons({
        createOrder: function (data, actions) {
            return actions.order.create({
                purchase_units: [
                    {
                        amount: {
                            value: value,
                        },
                    },
                ],
            });
        },
        onApprove: function (data, actions) {
            return actions.order.capture().then(function (details) {
                const collectionDay =
                    document.querySelector('.collection-day').value;
                const collectionTime =
                    document.querySelector('.collection-time').value;
                const discountCoupon =
                    document.querySelector('.discount-input').value || '';
                console.log(collectionTime, collectionDay, discountCoupon);

                window.location.replace(
                    `./orderProducts.php?collection_day=${collectionDay}&collection_time=${collectionTime}&discount_coupon=${discountCoupon}`
                );
            });
        },
    })
    .render('#paypal-payment-button');
