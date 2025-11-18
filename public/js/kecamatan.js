document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");

    const chartDataRaw = JSON.parse(el.dataset.chart);
    const mode = el.dataset.mode; 

    // Tentukan label berdasarkan mode
    const chartData = chartDataRaw.map(item => ({
        label: mode === "kecamatan" ? item.kecamatan : item.nama_desa,
        value: Number(item.jumlah_domain_konflik)
    }));

    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: chartData.map(p => p.label),
            datasets: [{
                label: mode === "kecamatan"
                    ? 'Top 10 Kecamatan dengan Jumlah Domain Konflik Terbanyak'
                    : `Desa: Jumlah Domain Konflik`,
                data: chartData.map(p => p.value),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        }
    });
});
