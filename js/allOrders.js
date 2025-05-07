


 function fetchOrders() {
            const ordersRef = firebase.database().ref('Orders');
            ordersRef.on('value', (snapshot) => {
                const orders = snapshot.val();
                displayOrders(orders);
                displayAcceptedOrders(orders);
                displayShipOrders(orders);
                displayCompletedOrders(orders);
            });
        }

        // Function to display orders
function displayOrders(orders) {
    const ordersTableBody = document.getElementById('ordersTableBody');
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
           if (order.status === 'pending') {
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

            const paymentCell = document.createElement('td');
            paymentCell.textContent = paymentMethods;
            row.appendChild(paymentCell);

            // Add the action buttons
            const actionCell = document.createElement('td');
            const actionButtonsDiv = document.createElement('div');
            actionButtonsDiv.classList.add('action-buttons');

            const approveImage = document.createElement('button');
            approveImage.textContent = 'Approve';
            approveImage.classList.add('action-buttons');

            approveImage.src = 'image/accept.png'; // Path to your approve image
            approveImage.alt = 'Approve';
          
            
            approveImage.onclick = function() {
            let orderSummary = '<table style="width:100%; text-align:center;">' +
                       '<tr><th>Order ID</th><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th><th>Ref #</th><th>Delivery Method</th><th>Add-ons</th><th>Address</th></tr>';

    for (const orderId in customerOrders) {
        const order = customerOrders[orderId];

        if (order.status !== 'pending') {
            continue;
        }

        const fullName = order.fullName;
        const refNum = order.refNumber;
        const total = order.total;
        const orderDate = order.orderTime;
		const address = order.address;
        const deliveryMethod = order.deliveryMethod;


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
                                <td>${refNum}</td>
                                <td>${deliveryMethod}</td>
                                <td>${addonsDetails}</td>
                                <td>${address.length > 20 ? address.substring(0, 20) + '...' : address}</td>
                             </tr>`;

        });

		orderSummary += `<tr>
                            <td style="text-align:left; "><strong>Order Date:</strong></td>
                            <td style='text-align:left;'>${orderDate}</td>
                         </tr>`;
        orderSummary += `<tr>
                            <td style="text-align:left;"><strong>Total:</strong></td>
                            <td style='font-size: 30px; font-weight: 600; text-align:left; '>${total}</td>
                         </tr>`;
        
    }

    orderSummary += '</table>';

    // Show confirmation dialog with add-ons
    Swal.fire({
        title: 'Do you want to accept this order?',
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
            console.log('Approved', customer);

            const acceptedTime = new Date().toLocaleString();

            for (const orderId in customerOrders) {
                const order = customerOrders[orderId];
                if (order.status === 'pending') {
                    order.status = 'accepted';
                    order.acceptedTime = acceptedTime;
                    Swal.fire('Order confirmed!', '', 'success');

                    const orderRef = firebase.database().ref(`Orders/${customer}/${orderId}`);
                    orderRef.update({
                        status: 'accepted',
                        acceptedTime: acceptedTime
                    }).then(() => {
                        displayOrders(orders); // Refresh the orders after update
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

            const rejectImage = document.createElement('button');
            rejectImage.textContent = 'Reject';
            rejectImage.classList.add('rej');

            const mess = document.createElement('button');
            mess.textContent = 'Message';
            mess.classList.add('mess');

            mess.addEventListener('click', () => {
                const customerName = encodeURIComponent(customer);

                // Display a confirmation dialog using SweetAlert
                Swal.fire({
                    title: 'Open Conversation',
                    text: `Do you want to start a conversation with ${customer}?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // If user confirms, redirect to the message page with the customer parameter in the URL
                        window.location.href = `chatTesting.html?customer=${customerName}`;
                        console.log("Redirecting to chat with customer:", customer);
                 } else {
                        console.log("User canceled the conversation start.");
                    }
                });
            });


            rejectImage.onclick = function() {
                // Handle reject action here
                console.log('Rejected', customer);
            };

            actionButtonsDiv.appendChild(mess);
            actionButtonsDiv.appendChild(rejectImage);

            actionCell.appendChild(actionButtonsDiv);
            row.appendChild(actionCell);

            ordersTableBody.appendChild(row);
        }
    }
} 


function displayAcceptedOrders(orders) {
    const ordersTableBody = document.getElementById('acceptedOrdersTableBody');
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
           if (order.status === 'accepted') {
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
approveImage.onclick = function() {
    let orderSummary = '<table style="width:100%; text-align:center;">' +
                       '<tr><th>Order ID</th><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th><th>Add-ons</th></tr>';

    for (const orderId in customerOrders) {
        const order = customerOrders[orderId];

        if (order.status !== 'accepted') {
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
        title: 'Do you want to ship this order?',
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

                        const shipTime = new Date().toLocaleString();

                        for (const orderId in customerOrders) {
                            const order = customerOrders[orderId];
                            if (order.status === 'accepted') {
                                order.status = 'in transit';
                                order.shipTime = shipTime;
                                Swal.fire('Order confirmed!', '', 'success');

                                const orderRef = firebase.database().ref(`Orders/${customer}/${orderId}`);
                                orderRef.update({
                                    status: 'in transit',
                                    shipTime: shipTime
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
approveImage.onclick = function() {
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







function displayCompletedOrders(orders) {
    const ordersTableBody = document.getElementById('completedOrdersTableBody');
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
           if (order.status === 'delivered') {
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
approveImage.onclick = function() {
    let orderSummary = '<table style="width:100%; text-align:center;">' +
                       '<tr><th>Order ID</th><th>Customer</th><th>Product</th><th>Quantity</th><th>Size</th><th>Price</th><th>Add-ons</th></tr>';

    for (const orderId in customerOrders) {
        const order = customerOrders[orderId];

        if (order.status !== 'delivered') {
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
        title: 'Order Details',
        html: orderSummary,
        showDenyButton: false,
        showCancelButton: false,
       
        width: '90%',
        customClass: {
            actions: 'my-actions',
            cancelButton: 'order-1 right-gap',
            confirmButton: 'order-2',
            denyButton: 'order-3',
        },
    }).then((result) => {
                   
                });
};

            actionButtonsDiv.appendChild(approveImage);


            actionCell.appendChild(actionButtonsDiv);
            row.appendChild(actionCell);

            ordersTableBody.prepend(row); // Only append the row if it contains pending orders
        }
    }
} 



        fetchOrders();