document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    // Ambil data dari atribut data-*
    const kecamatan = JSON.parse(el.dataset.kecamatan);

   // --- Chart Kecamatan ---
    const kecamatanData = kecamatan.map(item => ({
        label: item.kecamatan,
        value: Number(item.jumlah_domain_konflik)
    }));

    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: kecamatanData.map(k => k.label),
            datasets: [{
                label: 'Jumlah Domain Konflik per Kecamatan',
                data: kecamatanData.map(k => k.value),
                backgroundColor: 'rgba(255, 99, 132, 0.6)',
            }]
        }
    })

});
