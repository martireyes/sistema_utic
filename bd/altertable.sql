-- SUCURSAL (1 registro)
CREATE SEQUENCE IF NOT EXISTS sucursal_id_sucursal_seq;
ALTER TABLE sucursal
ALTER COLUMN id_sucursal SET DEFAULT nextval('sucursal_id_sucursal_seq');
SELECT setval('sucursal_id_sucursal_seq',
              COALESCE((SELECT MAX(id_sucursal) FROM sucursal),0));

-- GRUPOS (1 registro)
CREATE SEQUENCE IF NOT EXISTS grupos_gru_cod_seq;
ALTER TABLE grupos
ALTER COLUMN gru_cod SET DEFAULT nextval('grupos_gru_cod_seq');
SELECT setval('grupos_gru_cod_seq',
              COALESCE((SELECT MAX(gru_cod) FROM grupos),0));

-- MODULOS
CREATE SEQUENCE IF NOT EXISTS modulos_mod_cod_seq;
ALTER TABLE modulos
ALTER COLUMN mod_cod SET DEFAULT nextval('modulos_mod_cod_seq');

-- PAGINAS
CREATE SEQUENCE IF NOT EXISTS paginas_pag_cod_seq;
ALTER TABLE paginas
ALTER COLUMN pag_cod SET DEFAULT nextval('paginas_pag_cod_seq');

-- PROVEEDOR
CREATE SEQUENCE IF NOT EXISTS proveedor_prv_cod_seq;
ALTER TABLE proveedor
ALTER COLUMN prv_cod SET DEFAULT nextval('proveedor_prv_cod_seq');

-- TIPO_IMPUESTO
CREATE SEQUENCE IF NOT EXISTS tipo_impuesto_tipo_cod_seq;
ALTER TABLE tipo_impuesto
ALTER COLUMN tipo_cod SET DEFAULT nextval('tipo_impuesto_tipo_cod_seq');

-- MARCA
CREATE SEQUENCE IF NOT EXISTS marca_mar_cod_seq;
ALTER TABLE marca
ALTER COLUMN mar_cod SET DEFAULT nextval('marca_mar_cod_seq');

-- DEPOSITO
CREATE SEQUENCE IF NOT EXISTS deposito_dep_cod_seq;
ALTER TABLE deposito
ALTER COLUMN dep_cod SET DEFAULT nextval('deposito_dep_cod_seq');

-- CLIENTES
CREATE SEQUENCE IF NOT EXISTS clientes_cli_cod_seq;
ALTER TABLE clientes
ALTER COLUMN cli_cod SET DEFAULT nextval('clientes_cli_cod_seq');

-- CARGO (1 registro)
CREATE SEQUENCE IF NOT EXISTS cargo_car_cod_seq;
ALTER TABLE cargo
ALTER COLUMN car_cod SET DEFAULT nextval('cargo_car_cod_seq');
SELECT setval('cargo_car_cod_seq',
              COALESCE((SELECT MAX(car_cod) FROM cargo),0));

-- EMPLEADO (1 registro)
CREATE SEQUENCE IF NOT EXISTS empleado_emp_cod_seq;
ALTER TABLE empleado
ALTER COLUMN emp_cod SET DEFAULT nextval('empleado_emp_cod_seq');
SELECT setval('empleado_emp_cod_seq',
              COALESCE((SELECT MAX(emp_cod) FROM empleado),0));

-- USUARIOS (2 registros)
CREATE SEQUENCE IF NOT EXISTS usuarios_usu_cod_seq;
ALTER TABLE usuarios
ALTER COLUMN usu_cod SET DEFAULT nextval('usuarios_usu_cod_seq');
SELECT setval('usuarios_usu_cod_seq',
              COALESCE((SELECT MAX(usu_cod) FROM usuarios),0));

-- PEDIDO_CABCOMPRA
CREATE SEQUENCE IF NOT EXISTS pedido_cabcompra_ped_com_seq;
ALTER TABLE pedido_cabcompra
ALTER COLUMN ped_com SET DEFAULT nextval('pedido_cabcompra_ped_com_seq');

-- COMPRAS
CREATE SEQUENCE IF NOT EXISTS compras_com_cod_seq;
ALTER TABLE compras
ALTER COLUMN com_cod SET DEFAULT nextval('compras_com_cod_seq');

-- VENTAS
CREATE SEQUENCE IF NOT EXISTS ventas_ven_cod_seq;
ALTER TABLE ventas
ALTER COLUMN ven_cod SET DEFAULT nextval('ventas_ven_cod_seq');

-- PEDIDO_CABVENTA
CREATE SEQUENCE IF NOT EXISTS pedido_cabventa_ped_cod_seq;
ALTER TABLE pedido_cabventa
ALTER COLUMN ped_cod SET DEFAULT nextval('pedido_cabventa_ped_cod_seq');

-- ARTICULO
CREATE SEQUENCE IF NOT EXISTS articulo_art_cod_seq;
ALTER TABLE articulo
ALTER COLUMN art_cod SET DEFAULT nextval('articulo_art_cod_seq');