document.addEventListener("DOMContentLoaded", () => {
    const el = document.getElementById("dashboardData");
    if (!el) return;

    const chartDataRaw = JSON.parse(el.dataset.chart);
    const mode = el.dataset.mode;

    const chartData = chartDataRaw.map(item => ({
        label: item.kecamatan,
        value: Number(item.jumlah_domain_konflik),
        kota: item.kota_kabupaten ?? '-',
        provinsi: item.provinsi ?? '-'
    }));

    new Chart(document.getElementById('chartKecamatan'), {
        type: 'bar',
        data: {
            labels: chartData.map(p => p.label),
            datasets: [{
                label: 'Jumlah Domain Konflik',
                data: chartData.map(p => p.value),
                backgroundColor: 'rgba(54, 162, 235, 0.6)',
            }]
        },
        options: {
            plugins: {
                tooltip: {
                    callbacks: {
                        title: function (context) {
                            const i = context[0].dataIndex;
                            return chartData[i].label;
                        },
                        label: function (context) {
                            const i = context.dataIndex;
                            const d = chartData[i];

                            return [
                                `Jumlah Konflik : ${d.value}`,
                                `Kota/Kab     : ${d.kota}`,
                                `Provinsi     : ${d.provinsi}`
                            ];
                        }
                    }
                }
            }
        }
    });
});
