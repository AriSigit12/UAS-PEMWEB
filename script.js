document.getElementById('userForm').addEventListener('submit', function(event) {
    // Validasi sebelum form dikirim
    const name = document.getElementById('name').value;
    const email = document.getElementById('email').value;

    if (!name || !email) {
        alert("Nama dan Email harus diisi!");
        event.preventDefault();
    }

    // Mengecek apakah checkbox berlangganan dipilih
    const subscribe = document.getElementById('subscribe').checked;
    if (subscribe) {
        alert("Terima kasih telah memilih untuk berlangganan!");
    }
});

function addDataToTable(name, email, gender, subscribe) {
    const table = document.getElementById("dataTable").getElementsByTagName('tbody')[0];
    const newRow = table.insertRow();

    newRow.innerHTML = `<td>${name}</td><td>${email}</td><td>${gender}</td><td>${subscribe ? "Ya" : "Tidak"}</td>`;
}

// Event listener untuk memuat data dari session atau cookie
window.onload = function() {
    const name = sessionStorage.getItem("name");
    const email = sessionStorage.getItem("email");
    const gender = sessionStorage.getItem("gender");
    const subscribe = sessionStorage.getItem("subscribe");

    if (name && email && gender) {
        addDataToTable(name, email, gender, subscribe === "true");
    }
};
