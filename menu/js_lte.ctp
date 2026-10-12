<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js" crossorigin="anonymous" > </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" crossorigin="anonymous"> </script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" crossorigin="anonymous" > </script>
<script src="https://cdn.jsdelivr.net/npm/admin-lte@4.9.1/dist/js/adminlte.min.js"></script>
<script>
      const SELECTOR_SIDEBAR_WRAPPER = '.sidebar-wrapper';
      const Default = {
        scrollbarTheme: 'os-theme-light',
        scrollbarAutoHide: 'leave',
        scrollbarClickScroll: true,
      };
      document.addEventListener('DOMContentLoaded', function () {
        const sidebarWrapper = document.querySelector(SELECTOR_SIDEBAR_WRAPPER);

        // Disable OverlayScrollbars on mobile devices to prevent touch interference
        const isMobile = window.innerWidth <= 992;

        if (
          sidebarWrapper &&
          OverlayScrollbarsGlobal?.OverlayScrollbars !== undefined &&
          !isMobile
        ) {
          OverlayScrollbarsGlobal.OverlayScrollbars(sidebarWrapper, {
            scrollbars: {
              theme: Default.scrollbarTheme,
              autoHide: Default.scrollbarAutoHide,
              clickScroll: Default.scrollbarClickScroll,
            },
          });
        }
      });
</script>
<script>
      (() => {
        'use strict';
        const mode = () =>
          document.documentElement.getAttribute('data-bs-theme') === 'dark' ? 'dark' : 'light';
        // `Apex` is ApexCharts' global-options object; it must exist before the library loads.
        // theme.mode also sets a dark chart background — keep the card's instead.
        // eslint-disable-next-line unicorn/no-global-object-property-assignment
        globalThis.Apex ||= {};
        const apex = globalThis.Apex;
        apex.theme = { mode: mode() };
        apex.chart = Object.assign(apex.chart || {}, { background: 'transparent' });
        new MutationObserver(() => {
          const next = mode();
          apex.theme = { mode: next };
          const instances = apex._chartInstances || [];
          for (const { chart } of instances) {
            chart.updateOptions({ theme: { mode: next } }, false, false);
          }
        }).observe(document.documentElement, {
          attributes: true,
          attributeFilter: ['data-bs-theme'],
        });
      })();
</script>
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@6.5.0/dist/js/tabulator.min.js"></script>
<script>
  const statusBadge = (cell) => {
    const value = cell.getValue();
    const map = { activo: 'success', inactivo: 'danger' };
    const color = map[value] || 'danger';
    return `<span class="badge text-bg-${color}">${value}</span>`;
  };

  const express = require('express');
  const { Pool } = require('pg');
  const cors = require('cors');
  const app = express();
  app.use(cors());
  app.use(express.json());
  // Configuración de la conexión a tu base de datos lp3 en PostgreSQL
  const pool = new Pool({
    user: 'postgres',
    host: 'localhost',
    database: 'lp3',
    password: '123',
    port: 5432,
  });

  // Endpoint para listar los datos
  app.get('/api/cargos', async (req, res) => {
    try {
      const query = 'SELECT car_cod, car_descri, created_at, car_estado FROM cargos ORDER BY car_cod ASC';
      const { rows } = await pool.query(query);
      res.json(rows);
    } catch (err) {
      console.error(err);
      res.status(500).json({ error: 'Error al obtener los datos de la base de datos' });
    }
  });
  app.listen(3000, () => {
    console.log('Servidor corriendo en http://localhost:3000');
  });

  document.addEventListener('DOMContentLoaded', () => {
        const tabla = new Tabulator('#cargo-table', {
          ajaxURL: 'http://localhost:3000/api/cargos', // URL de tu API Node.js
          layout: 'fitColumns',
          pagination: true,
          paginationSize: 5,
          paginationSizeSelector: [5, 10, 25, 50],
          movableColumns: true,
          placeholder: 'Cargando datos...',
          columns: [
            { title: 'Código', field: 'car_cod', width: 90, headerSort: true, hozAlign: 'center' },
            { title: 'Descripción', field: 'car_descri', headerFilter: 'input' },
            { title: 'Creado el', field: 'created_at', sorter: 'datetime', width: 180, hozAlign: 'center' },
            { 
              title: 'Estado', 
              field: 'car_estado', 
              formatter: statusBadge,
              headerFilter: 'list',
              headerFilterParams: { values: ['', 'activo', 'inactivo'] },
              width: 140,
              hozAlign: 'center',
            },
          ],
        });

        const table = new Tabulator('#cargo-table', {
          data: data,
          layout: 'fitColumns',
          pagination: true,
          paginationSize: 10,
          paginationSizeSelector: [10, 25, 50, 100],
          movableColumns: true,
          columns: [
            { title: '#', field: 'id', width: 60, headerSort: true },
            { title: 'Name', field: 'name', headerFilter: 'input' },
            { title: 'Email', field: 'email', headerFilter: 'input' },
            {
              title: 'Role',
              field: 'role',
              headerFilter: 'list',
              headerFilterParams: { values: ['', 'Admin', 'Editor', 'Viewer'] },
              width: 120,
            },
            {
              title: 'Status',
              field: 'status',
              formatter: statusBadge,
              headerFilter: 'list',
              headerFilterParams: { values: ['', 'Active', 'Invited', 'Suspended'] },
              width: 130,
              hozAlign: 'center',
            },
            { title: 'Joined', field: 'joined', sorter: 'date', width: 130 },
          ],
        });

        document.getElementById('table-filter').addEventListener('input', (e) => {
          const value = e.target.value;
          if (value) {
            table.setFilter([
              [
                { field: 'name', type: 'like', value: value },
                { field: 'email', type: 'like', value: value },
              ],
            ]);
          } else {
            table.clearFilter();
          }
        });

        document
          .getElementById('export-csv')
          .addEventListener('click', () => table.download('csv', 'users.csv'));
        document
          .getElementById('export-json')
          .addEventListener('click', () => table.download('json', 'users.json'));
        document
          .getElementById('print-table')
          .addEventListener('click', () => table.print(false, true));
      });
</script>
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js" crossorigin="anonymous" > </script>
<script>
      new Sortable(document.querySelector('.connectedSortable'), {
        group: 'shared',
        handle: '.card-header',
      });

      const cardHeaders = document.querySelectorAll('.connectedSortable .card-header');
      cardHeaders.forEach((cardHeader) => {
        cardHeader.style.cursor = 'move';
      });
</script>
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js" integrity="sha256-+vh8GkaU7C9/wbSLIcwq82tQ2wTf44aOHA8HlBMwRI8=" crossorigin="anonymous" > </script>
<script>
      const sales_chart_options = {
        series: [
          {
            name: 'Digital Goods',
            data: [28, 48, 40, 19, 86, 27, 90],
          },
          {
            name: 'Electronics',
            data: [65, 59, 80, 81, 56, 55, 40],
          },
        ],
        chart: {
          id: 'revenue-chart',
          height: 300,
          type: 'area',
          toolbar: {
            show: false,
          },
        },
        legend: {
          show: false,
        },
        colors: ['#0d6efd', '#20c997'],
        dataLabels: {
          enabled: false,
        },
        stroke: {
          curve: 'smooth',
        },
        xaxis: {
          type: 'datetime',
          categories: [
            '2023-01-01',
            '2023-02-01',
            '2023-03-01',
            '2023-04-01',
            '2023-05-01',
            '2023-06-01',
            '2023-07-01',
          ],
        },
        tooltip: {
          x: {
            format: 'MMMM yyyy',
          },
        },
      };

      const sales_chart = new ApexCharts(
        document.querySelector('#revenue-chart'),
        sales_chart_options,
      );
      sales_chart.render();
</script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js" integrity="sha256-/t1nN2956BT869E6H4V1dnt0X5pAQHPytli+1nTZm2Y=" crossorigin="anonymous" > </script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js" integrity="sha256-XPpPaZlU8S/HWf7FZLAncLg2SAkP8ScUTII89x9D3lY=" crossorigin="anonymous" > </script>
<!-- <script type="module" src="https://static.cloudflareinsights.com/beacon.min.js/v31edd6df95cf4e85bb4c19e7a9bdbcba1788362987495" integrity="sha512-iIg7k2xntmwu6/uSb5tpc/hySgZc4eoL31yB29W6tJFo2akwjPWcEqnCEdJvGexCL0KEQwVYv5BlowfhVz26hg==" data-cf-beacon='{"version":"2024.11.0","token":"2437d112162f4ec4b63c3ca0eb38fb20","r":1,"spa":2}' crossorigin="anonymous"></script> -->
<script src="https://cdn.jsdelivr.net/npm/tabulator-tables@6.4.0/dist/js/tabulator.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/tabulator-tables@6.5.0/dist/js/tabulator.min.js"></script>