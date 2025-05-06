function displayStaff() {
    const displayStaffDiv = document.getElementById('displayStaff');
    displayStaffDiv.innerHTML = ''; // Clear previous data

    // Get staff data from Firebase Realtime Database
    const staffRef = database.ref('Staff');

    staffRef.on('value', (snapshot) => {
        snapshot.forEach((childSnapshot) => {
            const staffData = childSnapshot.val();
            const staffName = staffData.name;
            const staffPosition = staffData.position;
            const staffImageURL = staffData.imageURL; // URL of the staff image

            // Create staff element
            const staffDiv = document.createElement('div');

            // Create image element if URL exists
            const imageElement = staffImageURL ? 
                `<img src="${staffImageURL}" alt="${staffName}'s Image" class="staff-image">` : 
                `<img src="image/placeholder.png" alt="Default Image" class="staff-image">`;

            staffDiv.innerHTML = `
                <div class="staff-info">
                    <div class="staffIMG">
						${imageElement}
					</div>
					<div class="staffN">
						<p>${staffName}</p>
					</div>
					<div class="staffPos">
						<p>Position : ${staffPosition}</p>
					</div>
                </div>
            `;

            // Append staff element to displayStaff div
            displayStaffDiv.appendChild(staffDiv);
        });
    });
}

function sendStaff() {
    // Retrieve form values
    const staffName = document.getElementById('staffName').value.trim();
    const gender = document.querySelector('select').value;
    const staffUsername = document.getElementById('staffUsername').value.trim();
    const staffNumber = document.getElementById('staffNumber').value.trim();
    const staffGmail = document.getElementById('staffGmail').value.trim();
    const staffAddress = document.getElementById('staffAddress').value.trim();
    const staffPosition = document.getElementById('staffPosition').value.trim();
    const staffPass = document.getElementById('staffPass').value.trim();
    const staffImage = document.getElementById('staffImage').files[0]; // Get selected file

    // Check if any required fields are empty
    if (!staffName) {
        alert('Please input the staff name.');
        return;
    }
    if (!gender) {
        alert('Please select a gender.');
        return;
    }
    if (!staffNumber) {
        alert('Please input the phone number.');
        return;
    }
    if (!staffUsername) {
        alert('Please input the username.');
        return;
    }
    if (!staffGmail) {
        alert('Please input the Gmail.');
        return;
    }
    if (!staffAddress) {
        alert('Please input the address.');
        return;
    }
    if (!staffPosition) {
        alert('Please input the position.');
        return;
    }
    if (!staffPass) {
        alert('Please input the password.');
        return;
    }

    // Validate phone number length
    if (staffNumber.length > 11) {
        alert('Phone number cannot exceed 11 digits.');
        return;
    }

    // Create staff object
    const staffData = {
        name: staffName,
        gender: gender,
        phoneNumber: staffNumber,
        gmail: staffGmail,
        address: staffAddress,
        position: staffPosition,
        username: staffUsername,
        password: staffPass
    };

    if (staffImage) {
        const storageRef = storage.ref('staffImages/' + staffImage.name);

        const uploadTask = storageRef.put(staffImage);

        uploadTask.on('state_changed', (snapshot) => {
            const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
            console.log('Upload is ' + progress + '% done');
        }, (error) => {
            // Handle errors here
            console.error('Upload failed:', error);
        }, () => {
            uploadTask.snapshot.ref.getDownloadURL().then((downloadURL) => {
                staffData.imageURL = downloadURL;

                database.ref('Staff/' + staffName).set(staffData)
                    .then(() => {
                        alert('Staff added successfully!');
                        document.getElementById('staff_form').reset();
                        displayStaff(); // Refresh staff display
                    })
                    .catch((error) => {
                        console.error('Error adding staff:', error);
                    });
            });
        });
    } else {
        database.ref('Staff/' + staffName).set(staffData)
            .then(() => {
                alert('Staff added successfully!');
                document.getElementById('staff_form').reset();
                displayStaff(); // Refresh staff display
            })
            .catch((error) => {
                console.error('Error adding staff:', error);
            });
    }
}



displayStaff();