
//graficas
(function ($) {
    "use strict"; 
                
    // Pie Chart
    var ctxRutinarias = $("#grfc_rutinarias").get(0).getContext("2d");
    var myChartRutinarias = new Chart(ctxRutinarias, {
            type: "pie",
            data: {
                labels: ["Si", "No"],
                datasets: [{
                    backgroundColor: [
                        "rgba(0, 156, 255, .3)",
                        "rgba(0, 156, 255, .6)"
                    ],
                    data: [rutinarias, noRutinarias]
                }]
            },
            options: {
                responsive: true
            }
        });
// Pie Chart

      var ctx5 = $("#grfc_peligros_no_aceptables_tarea").get(0).getContext("2d");
      var myChart5 = new Chart(ctx5, {
          type: "pie",
          data: {
              labels: labels_tareas,
              datasets: [{
                  backgroundColor: [
                      "rgba(0, 156, 255, .7)",
                      "rgba(0, 156, 255, .6)",
                      "rgba(0, 156, 255, .5)",
                      "rgba(0, 156, 255, .4)"
                  ],
                  data: cantidad_peligros
              }]
          },
          options: {
              responsive: true
          }
      });
      // Doughnut Chart
      var ctx6 = $("#grfc_peligros_control_tarea").get(0).getContext("2d");
      var myChart6 = new Chart(ctx6, {
          type: "doughnut",
          data: {
              labels: labels_control,
              datasets: [{
                  backgroundColor: [
                      "rgba(0, 156, 255, .7)",
                      "rgba(0, 156, 255, .6)",
                      "rgba(0, 156, 255, .5)",
                      "rgba(0, 156, 255, .4)",
                      "rgba(0, 156, 255, .3)"
                  ],
                  data: cantidad_peligros_control
              }]
          },
          options: {
              responsive: true
          }
      });
            // Single Bar Chart
            var ctx4 = $("#bar-chart").get(0).getContext("2d");
            var myChart4 = new Chart(ctx4, {
                type: "bar",
                data: {
                    labels: labels_procesos,
                    datasets: [{
                        backgroundColor: [
                            "rgba(0, 156, 255, .7)"
                        ],
                        data: cantidad_peligros_proceso
                    }]
                },
                options: {
                    responsive: true
                }
            });
      // multiple bar char
      var ctx1 = $("#peligros_zona").get(0).getContext("2d");
      var myChart1 = new Chart(ctx1, {
          type: "bar",
          data: {
              labels: labels_zonas,
              datasets: [{
                      label: "ACEPTABLE",
                      data: data_aceptables,
                      backgroundColor: "rgba(0, 255, 0, 0.6)"
                  },
                  {
                      label: "MEJORABLE",
                      data: data_mejorables,
                      backgroundColor: "rgba(255, 255, 0, 0.6)"
                  },
                  {
                      label: "CON CONTROL",
                      data: data_control,
                      backgroundColor: "rgba(255, 94, 0, 0.6)"
                  },
                  {
                      label: "NO ACEPTABLE",
                      data: data_noaceptables,
                      backgroundColor: "rgba(255, 0, 0, 0.6"
                  }
              ]
              },
          options: {
              responsive: true
          }
      });
  
  
      // Salse & Revenue Chart
      var ctx2 = $("#salse-revenue").get(0).getContext("2d");
      var myChart2 = new Chart(ctx2, {
          type: "line",
          data: {
              labels: ["2016", "2017", "2018", "2019", "2020", "2021", "2022"],
              datasets: [{
                      label: "Salse",
                      data: [15, 30, 55, 45, 70, 65, 85],
                      backgroundColor: "rgba(0, 156, 255, .5)",
                      fill: true
                  },
                  {
                      label: "Revenue",
                      data: [99, 135, 170, 130, 190, 180, 270],
                      backgroundColor: "rgba(0, 156, 255, .3)",
                      fill: true
                  }
              ]
              },
          options: {
              responsive: true
          }
      });
      
  
  
      // Single Line Chart
      var ctx3 = $("#line-chart").get(0).getContext("2d");
      var myChart3 = new Chart(ctx3, {
          type: "line",
          data: {
              labels: [50, 60, 70, 80, 90, 100, 110, 120, 130, 140, 150],
              datasets: [{
                  label: "Salse",
                  fill: false,
                  backgroundColor: "rgba(0, 156, 255, .3)",
                  data: [7, 8, 8, 9, 9, 9, 10, 11, 14, 14, 15]
              }]
          },
          options: {
              responsive: true
          }
      }); 
    
  })(jQuery);