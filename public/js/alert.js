// Hapus data
function confirmDelete(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang dihapus tidak dapat dikembalikan!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("delete-form-" + id).submit();
        }
    });
}

// Terima booking
function confirmReject(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Booking yang ditolak tidak bisa diubah!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Tolak!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("reject-form-" + id).submit();
        }
    });
}

// Tolak booking
function confirmReceipt(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Booking yang diterima tidak bisa diubah!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Terima!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("accept-form-" + id).submit();
        }
    });
}

// Booking selesai
function confirmFinish(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Booking yang sudah selesai tidak bisa diubah!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Terima!",
        cancelButtonText: "Batal",
    }).then((result) => {
        if (result.isConfirmed) {
            document.getElementById("finish-form-" + id).submit();
        }
    });
}
