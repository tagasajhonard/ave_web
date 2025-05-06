function displayShipOrders(orders) {
    const ordersTableBody = document.getElementById('toShipOrdersTableBody');
    ordersTableBody.innerHTML = '';

    for (const customer in orders) {
        const customerOrders = orders[customer];
        const row = document.createElement('tr');
        row.classList.add('itemInDialog');

        // Initialize strings to collect data
        let productNames = '';
        let productPrices = '';
        let quantities = '';
        let sizes = '';
        let sugarLvl = '';
        let paymentMethods = '';
        let orderId = '';

        let hasPendingOrder = false; // Flag to track if there is at least one pending order

        for (const orderIdKey in customerOrders) {
            const order = customerOrders[orderIdKey];

            orderId = orderIdKey;

            // Only process orders with 'pending' status
            if (order.status === 'in transit') {
                hasPendingOrder = true; // Set flag to true if a pending order is found

                // Iterate through order items
                order.items.forEach((orderItem) => {
                    productNames += orderItem.productName + '<br>'; // Collect product names
                    productPrices += orderItem.productPrice + '<br>'; // Collect product prices
                    quantities += orderItem.quantity + '<br>'; // Collect quantities
                    sizes += orderItem.size + '<br>'; // Collect sizes
                    sugarLvl += orderItem.sugarLevel + '%<br>'; // Collect sugar level

                });

                // Collect payment method and status (same for all items in the order)
                paymentMethods = order.paymentMethod;
                status = order.status;
            }

        }

        // Only append the row to the table if a pending order was found
        if (hasPendingOrder) {

            const orderIdCell = document.createElement('td');
            orderIdCell.innerHTML = orderId; // Display order ID
            row.appendChild(orderIdCell);

            // Create cells for customer and aggregated data
            const customerCell = document.createElement('td');
            customerCell.innerHTML = customer; // Display customer name
            row.appendChild(customerCell);

            const productCell = document.createElement('td');
            productCell.innerHTML = productNames; // Display all product names
            row.appendChild(productCell);

            const sizeCell = document.createElement('td');
            sizeCell.innerHTML = sizes; // Display all sizes
            row.appendChild(sizeCell);

            const sugarCell = document.createElement('td');
            sugarCell.innerHTML = sugarLvl; // Display all sizes
            row.appendChild(sugarCell);

            const priceCell = document.createElement('td');
            priceCell.innerHTML = productPrices; // Display all product prices
            row.appendChild(priceCell);

            const quantityCell = document.createElement('td');
            quantityCell.innerHTML = quantities; // Display all quantities
            row.appendChild(quantityCell);

            // const addonsCell = document.createElement('td');
            // addonsCell.innerHTML = addonsInfo; // Display all add-ons
            // row.appendChild(addonsCell);

            const paymentCell = document.createElement('td');
            paymentCell.textContent = paymentMethods;
            row.appendChild(paymentCell);

            // Add the action buttons
            const actionCell = document.createElement('td');
            const actionButtonsDiv = document.createElement('div');
            actionButtonsDiv.classList.add('action-buttons');

            const approveImage = document.createElement('img');
            approveImage.src = 'image/accept.png'; // Path to your approve image
            approveImage.alt = 'Approve';
            approveImage.onclick = function () {
                let orderSummary = '<table style="width:100%; text-align:center;">' +
                    '<tr><th>Order ID</th><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th><th>Add-ons</th></tr>';

                for (const orderId in customerOrders) {
                    const order = customerOrders[orderId];

                    if (order.status !== 'in transit') {
                        continue;
                    }

                    const fullName = order.fullName;
                    const total = order.total;
                    const orderDate = order.orderTime;
                    const address = order.address;

                    order.items.forEach(item => {
                        let addonsDetails = '';

                        // Check if the item has add-ons
                        if (item.addons && item.addons.length > 0) {
                            // If add-ons are present, iterate and display them
                            item.addons.forEach((addon) => {
                                addonsDetails += `${addon.name} x ${addon.quantity}<br>`;
                            });
                        } else {
                            // If no add-ons are selected, display "No add-ons selected"
                            addonsDetails = 'No add-ons selected';
                        }

                        orderSummary += `<tr>
            					<td>${orderId}</td>
                                <td>${fullName}</td>
                                <td>${item.productName}</td>
                                <td>${item.quantity}</td>
                                <td>${item.size}</td>
                                <td>${item.productPrice}</td>
                                <td>${addonsDetails}</td>
                             </tr>`;
                    });
                    orderSummary += `<tr>
                            <td style="text-align:center;"><strong>Address:</strong> </td>
                            <td>${address}</td>
                         </tr>`;
                    orderSummary += `<tr>
                            <td style="text-align:center; "><strong>Order Date:</strong></td>
                            <td>${orderDate}</td>
                         </tr>`;
                    orderSummary += `<tr>
                            <td style="text-align:center;"><strong>Total:</strong></td>
                            <td style='font-size: 30px; font-weight: 600;  '>${total}</td>
                         </tr>`;

                }

                orderSummary += '</table>';

                // Show confirmation dialog with add-ons
                Swal.fire({
                    title: 'Confirm to receive this order?',
                    html: orderSummary,
                    showDenyButton: true,
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    denyButtonText: 'No',
                    width: '90%',
                    customClass: {
                        actions: 'my-actions',
                        cancelButton: 'order-1 right-gap',
                        confirmButton: 'order-2',
                        denyButton: 'order-3',
                    },
                }).then((result) => {
                    if (result.isConfirmed) {

                        const receivedTime = new Date().toLocaleString();

                        for (const orderId in customerOrders) {
                            const order = customerOrders[orderId];
                            if (order.status === 'in transit') {
                                order.status = 'delivered';
                                order.receivedTime = receivedTime;
                                Swal.fire('Order confirmed!', '', 'success');

                                const orderRef = firebase.database().ref(`Orders/${customer}/${orderId}`);
                                orderRef.update({
                                    status: 'delivered',
                                    receivedTime: receivedTime
                                }).then(() => {
                                    displayOrders(orders);
                                }).catch((error) => {
                                    console.error('Error updating order status:', error);
                                });
                            }
                        }
                    } else {
                        Swal.fire('Changes are not saved', '', 'info');
                    }
                });
            };

            actionButtonsDiv.appendChild(approveImage);

            actionCell.appendChild(actionButtonsDiv);
            row.appendChild(actionCell);

            ordersTableBody.prepend(row); // Only append the row if it contains pending orders
        }
    }
}