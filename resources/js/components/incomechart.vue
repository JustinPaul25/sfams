<template>
    <canvas id="myChart" width="400" height="400"></canvas>
</template>

<script>
    import Chart from 'chart.js/auto';

    export default {
        props: ['labels', 'studdata'],
        data() {
            return {
                rawData: []
            }
        },
        methods: {
            constructDatas() {
                const ctx = document.getElementById('myChart');
                const labels = this.labels
                const population = this.studdata

                const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Student Population Chart',
                            data:this.studdata,
                            fill: false,
                            borderColor: 'rgb(75, 192, 192)',
                            tension: 0.1
                        }]
                    },
                });
            }
        },
        async mounted() {
            this.constructDatas();
        }
    }
</script>