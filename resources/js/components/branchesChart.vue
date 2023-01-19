<template>
    <canvas id="branchesChart" width="1000" height="400"></canvas>
</template>

<script>
    import Chart from 'chart.js/auto';

    export default {
        props: ['labels', 'datas'],
        methods: {
            constructDatas() {
                const ctx = document.getElementById('branchesChart');
                const labels = this.labels;
                const datas = this.datas;

                const myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Branch Population',
                            data: datas,
                            borderColor: '#36A2EB',
                            backgroundColor: '#9BD0F5',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    },
                });
            }
        },
        async mounted() {
            this.constructDatas();
        }
    }
</script>
