document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    const chartDataRaw = JSON.parse(el.dataset.chart);
    const mode = el.dataset.mode; // "provinsi" atau "kabupaten"

    // Tentukan label berdasarkan mode
    const chartData = chartDataRaw.map(item => ({
        label: mode === "provinsi" ? item.provinsi : item.kota_kabupaten,
        value: Number(item.jumlah_domain_konflik)
    }));

    new Chart(document.getElementById('chartProvinsi'), {
        type: 'bar',
        data: {
            labels: chartData.map(p => p.label),
            datasets: [{
                label: mode === "provinsi"
                    ? 'Top 10 Provinsi dengan Jumlah Domain Konflik Terbanyak'
                    : `Kab/Kota: Jumlah Domain Konflik`,
                data: chartData.map(p => p.value),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        }
    });
});
