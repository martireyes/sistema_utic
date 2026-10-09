CREATE TABLE detalle_remision_compra (
    rem_cod INTEGER,
    art_cod INTEGER,
    dep_cod INTEGER,
    cantidad INTEGER,
    PRIMARY KEY(rem_cod,art_cod,dep_cod)
);

CREATE TABLE remision_compra (
    rem_cod SERIAL PRIMARY KEY,
    fecha DATE,
    prv_cod INTEGER,
    estado VARCHAR(1)
);

CREATE TABLE detalle_nota_compra (
    nota_cod INTEGER,
    art_cod INTEGER,
    cantidad INTEGER,
    monto NUMERIC(15,2),
    PRIMARY KEY(nota_cod,art_cod)
);

CREATE TABLE nota_compra (
    nota_cod SERIAL PRIMARY KEY,
    com_cod INTEGER,
    fecha DATE,
    tipo VARCHAR(1),
    motivo VARCHAR(200)
);

CREATE TABLE detalle_ajuste_stock (
    aju_cod INTEGER,
    art_cod INTEGER,
    dep_cod INTEGER,
    cantidad INTEGER,
    tipo VARCHAR(1),
    PRIMARY KEY(aju_cod,art_cod,dep_cod)
);

CREATE TABLE ajuste_stock (
aju_cod SERIAL PRIMARY KEY,
fecha DATE,
motivo VARCHAR(200),
usu_cod INTEGER
);

CREATE TABLE libro_compra (
    lib_cod SERIAL PRIMARY KEY,
    com_cod INTEGER,
    fecha DATE,
    nro_factura VARCHAR(20),
    proveedor VARCHAR(120),
    exenta NUMERIC(15,2),
    iva5 NUMERIC(15,2),
    iva10 NUMERIC(15,2),
    total NUMERIC(15,2)
);

CREATE TABLE orden_compra (
    oc_cod SERIAL PRIMARY KEY,
    pre_cod INTEGER,
    prv_cod INTEGER,
    fecha_oc DATE,
    estado VARCHAR(1)
);

CREATE TABLE detalle_presupuesto (
	pre_cod INTEGER,
	art_cod INTEGER,
	cantidad INTEGER,
	precio NUMERIC(15,2),
	PRIMARY KEY(pre_cod,art_cod)
);

CREATE TABLE presupuesto_proveedor (
    pre_cod SERIAL PRIMARY KEY,
    ped_com INTEGER NOT NULL,
    prv_cod INTEGER NOT NULL,
    fecha_presupuesto DATE NOT NULL,
    observacion VARCHAR(200),
    estado VARCHAR(1)
);

CREATE TABLE public.sucursal (
                id_sucursal INTEGER NOT NULL,
                suc_descri VARCHAR(60),
                CONSTRAINT sucursal_pkey PRIMARY KEY (id_sucursal)
);


CREATE TABLE public.grupos (
                gru_cod INTEGER NOT NULL,
                gru_nombre VARCHAR(40) NOT NULL,
                CONSTRAINT grupos_pk PRIMARY KEY (gru_cod)
);


CREATE TABLE public.modulos (
                mod_cod INTEGER NOT NULL,
                mod_nombre VARCHAR(50) NOT NULL,
                CONSTRAINT modulos_pk PRIMARY KEY (mod_cod)
);


CREATE TABLE public.paginas (
                pag_cod INTEGER NOT NULL,
                pag_direc VARCHAR(120) NOT NULL,
                pag_nombre VARCHAR(80) NOT NULL,
                mod_cod INTEGER NOT NULL,
                CONSTRAINT paginas_pk PRIMARY KEY (pag_cod)
);


CREATE TABLE public.permisos (
                pag_cod INTEGER NOT NULL,
                gru_cod INTEGER NOT NULL,
                leer BOOLEAN NOT NULL,
                insertar BOOLEAN NOT NULL,
                editar BOOLEAN NOT NULL,
                borrar BOOLEAN NOT NULL,
                CONSTRAINT permisos_pk PRIMARY KEY (pag_cod, gru_cod)
);


CREATE TABLE public.proveedor (
                prv_cod INTEGER NOT NULL,
                prv_ruc VARCHAR(60) NOT NULL,
                prv_razonsocial VARCHAR(120) NOT NULL,
                prv_direccion VARCHAR(150) NOT NULL,
                prv_telefono VARCHAR(60) NOT NULL,
                CONSTRAINT proveedor_pk PRIMARY KEY (prv_cod)
);


CREATE TABLE public.tipo_impuesto (
                tipo_cod INTEGER NOT NULL,
                tipo_descri VARCHAR(60) NOT NULL,
                tipo_porcen INTEGER NOT NULL,
                CONSTRAINT tipo_impuesto_pk PRIMARY KEY (tipo_cod)
);


CREATE TABLE public.marca (
                mar_cod INTEGER NOT NULL,
                mar_descri VARCHAR(60),
                CONSTRAINT marca_pk PRIMARY KEY (mar_cod)
);


CREATE TABLE public.deposito (
                dep_cod INTEGER NOT NULL,
                dep_descri VARCHAR(60),
                id_sucursal INTEGER NOT NULL,
                CONSTRAINT deposito_pk PRIMARY KEY (dep_cod)
);


CREATE TABLE public.clientes (
                cli_cod INTEGER NOT NULL,
                cli_ci INTEGER,
                cli_nombre VARCHAR(100),
                cli_apellido VARCHAR(100),
                cli_telefono VARCHAR(15),
                cli_direcc VARCHAR(100),
                CONSTRAINT clientes_pk PRIMARY KEY (cli_cod)
);


CREATE TABLE public.cargo (
                car_cod INTEGER NOT NULL,
                car_descri VARCHAR(60) NOT NULL,
                CONSTRAINT cargo_pk PRIMARY KEY (car_cod)
);


CREATE TABLE public.empleado (
                emp_cod INTEGER NOT NULL,
                car_cod INTEGER NOT NULL,
                emp_nombre VARCHAR(100),
                emp_apellido VARCHAR(100),
                emp_direcc VARCHAR(100) NOT NULL,
                emp_tel VARCHAR(20) NOT NULL,
                CONSTRAINT empleado_pk PRIMARY KEY (emp_cod)
);


CREATE TABLE public.usuarios (
                usu_cod INTEGER NOT NULL,
                usu_nick VARCHAR(60) NOT NULL,
                usu_clave VARCHAR(120) NOT NULL,
                emp_cod INTEGER NOT NULL,
                gru_cod INTEGER NOT NULL,
                id_sucursal INTEGER NOT NULL,
                CONSTRAINT usuarios_pk PRIMARY KEY (usu_cod)
);


CREATE TABLE public.pedido_cabcompra (
                ped_com INTEGER NOT NULL,
                emp_cod INTEGER NOT NULL,
                ped_fecha DATE NOT NULL,
                prv_cod INTEGER NOT NULL,
                ped_estado VARCHAR(1) NOT NULL,
                id_sucursal INTEGER NOT NULL,
                CONSTRAINT pedido_cabcompra_pk PRIMARY KEY (ped_com)
);


CREATE TABLE public.compras (
                com_cod INTEGER NOT NULL,
                emp_cod INTEGER NOT NULL,
                prv_cod INTEGER NOT NULL,
                com_fecha DATE NOT NULL,
                tipo_compra VARCHAR(10) NOT NULL,
                can_cuota INTEGER NOT NULL,
                com_plazo INTEGER NOT NULL,
                com_total INTEGER NOT NULL,
                com_estado VARCHAR(1) NOT NULL,
                id_sucursal INTEGER NOT NULL,
                CONSTRAINT compras_pk PRIMARY KEY (com_cod)
);


CREATE TABLE public.ped_compra (
                ped_com INTEGER NOT NULL,
                com_cod INTEGER NOT NULL,
                obs_pedido VARCHAR(60),
                CONSTRAINT ped_compra_pk PRIMARY KEY (ped_com, com_cod)
);


CREATE TABLE public.ctas_a_pagar (
                nro_cuota INTEGER NOT NULL,
                com_cod INTEGER NOT NULL,
                monto_cuota INTEGER NOT NULL,
                saldo_cuota INTEGER NOT NULL,
                fecha_venc DATE NOT NULL,
                estado_cuota VARCHAR(1) NOT NULL,
                CONSTRAINT ctas_a_pagar_pk PRIMARY KEY (nro_cuota, com_cod)
);


CREATE TABLE public.ventas (
                ven_cod INTEGER NOT NULL,
                emp_cod INTEGER NOT NULL,
                cli_cod INTEGER NOT NULL,
                ven_fecha DATE NOT NULL,
                tipo_venta VARCHAR(10) NOT NULL,
                can_cuota INTEGER NOT NULL,
                ven_plazo INTEGER NOT NULL,
                ven_total INTEGER NOT NULL,
                ven_estado VARCHAR(1) NOT NULL,
                id_sucursal INTEGER NOT NULL,
                CONSTRAINT ventas_pk PRIMARY KEY (ven_cod)
);


CREATE TABLE public.ctas_a_cobrar (
                nro_cuota INTEGER NOT NULL,
                ven_cod INTEGER NOT NULL,
                monto_cuota INTEGER NOT NULL,
                saldo_cuota INTEGER NOT NULL,
                fecha_venc DATE NOT NULL,
                estado_cuota VARCHAR(1) NOT NULL,
                CONSTRAINT ctas_a_cobrar_pk PRIMARY KEY (nro_cuota, ven_cod)
);


CREATE TABLE public.pedido_cabventa (
                ped_cod INTEGER NOT NULL,
                ped_fecha DATE NOT NULL,
                emp_cod INTEGER NOT NULL,
                cli_cod INTEGER NOT NULL,
                estado VARCHAR(1) NOT NULL,
                id_sucursal INTEGER NOT NULL,
                CONSTRAINT pedido_cabventa_pk PRIMARY KEY (ped_cod)
);


CREATE TABLE public.pedido_venta (
                ped_cod INTEGER NOT NULL,
                ven_cod INTEGER NOT NULL,
                obs_pedido VARCHAR(60),
                CONSTRAINT pedido_venta_pk PRIMARY KEY (ped_cod, ven_cod)
);


CREATE TABLE public.articulo (
                art_cod INTEGER NOT NULL,
                art_codbarra VARCHAR(15) NOT NULL,
                mar_cod INTEGER NOT NULL,
                art_descri VARCHAR(100),
                art_precioc INTEGER,
                art_preciov INTEGER,
                tipo_cod INTEGER NOT NULL,
                CONSTRAINT articulo_pk PRIMARY KEY (art_cod)
);


CREATE SEQUENCE public.movimiento_stock_mov_cod_seq;

CREATE TABLE public.movimiento_stock (
                mov_cod INTEGER NOT NULL DEFAULT nextval('public.movimiento_stock_mov_cod_seq'),
                fecha_mov DATE NOT NULL,
                art_cod INTEGER NOT NULL,
                dep_cod INTEGER NOT NULL,
                cant_mov INTEGER NOT NULL,
                tipo_mov VARCHAR NOT NULL,
                origen_mov VARCHAR NOT NULL,
                usu_cod INTEGER NOT NULL,
                CONSTRAINT movimiento_stock_pk PRIMARY KEY (mov_cod)
);


ALTER SEQUENCE public.movimiento_stock_mov_cod_seq OWNED BY public.movimiento_stock.mov_cod;

CREATE TABLE public.stock (
                dep_cod INTEGER NOT NULL,
                art_cod INTEGER NOT NULL,
                cant_minima INTEGER NOT NULL,
                stoc_cant INTEGER NOT NULL,
                CONSTRAINT stock_pk PRIMARY KEY (dep_cod, art_cod)
);


CREATE TABLE public.detalle_pedcompra (
                ped_com INTEGER NOT NULL,
                dep_cod INTEGER NOT NULL,
                art_cod INTEGER NOT NULL,
                ped_cant INTEGER NOT NULL,
                ped_precio INTEGER NOT NULL,
                CONSTRAINT detalle_pedcompra_pk PRIMARY KEY (ped_com, dep_cod, art_cod)
);


CREATE TABLE public.detalle_compra (
                dep_cod INTEGER NOT NULL,
                art_cod INTEGER NOT NULL,
                com_cod INTEGER NOT NULL,
                com_cant INTEGER NOT NULL,
                com_precio INTEGER NOT NULL,
                exenta INTEGER NOT NULL,
                iva_5 INTEGER NOT NULL,
                iva_10 INTEGER NOT NULL,
                CONSTRAINT detalle_compra_pk PRIMARY KEY (dep_cod, art_cod, com_cod)
);


CREATE TABLE public.detalle_pedventa (
                ped_cod INTEGER NOT NULL,
                dep_cod INTEGER NOT NULL,
                art_cod INTEGER NOT NULL,
                ped_cant INTEGER NOT NULL,
                ped_precio INTEGER NOT NULL,
                CONSTRAINT detalle_pedventa_pk PRIMARY KEY (ped_cod, dep_cod, art_cod)
);


CREATE TABLE public.detalle_ventas (
                ven_cod INTEGER NOT NULL,
                dep_cod INTEGER NOT NULL,
                art_cod INTEGER NOT NULL,
                ven_cant INTEGER NOT NULL,
                ven_precio INTEGER NOT NULL,
                exenta INTEGER NOT NULL,
                iva_5 INTEGER NOT NULL,
                iva_10 INTEGER NOT NULL,
                CONSTRAINT detalle_ventas_pk PRIMARY KEY (ven_cod, dep_cod, art_cod)
);

CREATE TABLE tokens (
    tok_cod SERIAL PRIMARY KEY,
    usu_cod INT NOT NULL,
    token VARCHAR(64) NOT NULL UNIQUE,
    tok_expira TIMESTAMP NOT NULL,
    tok_usado BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (usu_cod) REFERENCES usuarios(usu_cod) ON DELETE CASCADE
);

ALTER TABLE compras
ADD COLUMN pre_cod INTEGER;

ALTER TABLE compras
ADD COLUMN nro_factura VARCHAR(20);
ALTER TABLE compras
ADD COLUMN timbrado VARCHAR(20);
ALTER TABLE compras
ADD COLUMN condicion VARCHAR(10);

ALTER TABLE public.usuarios ADD CONSTRAINT usuarios_id_sucursal_fkey
FOREIGN KEY (id_sucursal)
REFERENCES public.sucursal (id_sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_cabventa ADD CONSTRAINT sucursal_pedido_cabventa_fk
FOREIGN KEY (id_sucursal)
REFERENCES public.sucursal (id_sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.deposito ADD CONSTRAINT sucursal_deposito_fk
FOREIGN KEY (id_sucursal)
REFERENCES public.sucursal (id_sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.compras ADD CONSTRAINT sucursal_compras_fk
FOREIGN KEY (id_sucursal)
REFERENCES public.sucursal (id_sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ventas ADD CONSTRAINT sucursal_ventas_fk
FOREIGN KEY (id_sucursal)
REFERENCES public.sucursal (id_sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_cabcompra ADD CONSTRAINT sucursal_pedido_cabcompra_fk
FOREIGN KEY (id_sucursal)
REFERENCES public.sucursal (id_sucursal)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.permisos ADD CONSTRAINT grupos_permisos_fk
FOREIGN KEY (gru_cod)
REFERENCES public.grupos (gru_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.usuarios ADD CONSTRAINT grupos_usuarios_fk
FOREIGN KEY (gru_cod)
REFERENCES public.grupos (gru_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.paginas ADD CONSTRAINT modulos_interfaces_fk
FOREIGN KEY (mod_cod)
REFERENCES public.modulos (mod_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.permisos ADD CONSTRAINT interfaces_permisos_fk
FOREIGN KEY (pag_cod)
REFERENCES public.paginas (pag_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.compras ADD CONSTRAINT proveedor_compras_fk
FOREIGN KEY (prv_cod)
REFERENCES public.proveedor (prv_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_cabcompra ADD CONSTRAINT proveedor_pedido_compra_fk
FOREIGN KEY (prv_cod)
REFERENCES public.proveedor (prv_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.articulo ADD CONSTRAINT tipo_impuesto_articulo_fk
FOREIGN KEY (tipo_cod)
REFERENCES public.tipo_impuesto (tipo_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.articulo ADD CONSTRAINT marca_articulo_fk
FOREIGN KEY (mar_cod)
REFERENCES public.marca (mar_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.stock ADD CONSTRAINT deposito_stock_fk
FOREIGN KEY (dep_cod)
REFERENCES public.deposito (dep_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.movimiento_stock ADD CONSTRAINT deposito_movimiento_stock_fk
FOREIGN KEY (dep_cod)
REFERENCES public.deposito (dep_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_cabventa ADD CONSTRAINT clientes_pedido_cab_fk
FOREIGN KEY (cli_cod)
REFERENCES public.clientes (cli_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ventas ADD CONSTRAINT clientes_ventas_fk
FOREIGN KEY (cli_cod)
REFERENCES public.clientes (cli_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.empleado ADD CONSTRAINT cargo_empleado_fk
FOREIGN KEY (car_cod)
REFERENCES public.cargo (car_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_cabventa ADD CONSTRAINT empleado_pedido_cab_fk
FOREIGN KEY (emp_cod)
REFERENCES public.empleado (emp_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ventas ADD CONSTRAINT empleado_ventas_fk
FOREIGN KEY (emp_cod)
REFERENCES public.empleado (emp_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.compras ADD CONSTRAINT empleado_compras_fk
FOREIGN KEY (emp_cod)
REFERENCES public.empleado (emp_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_cabcompra ADD CONSTRAINT empleado_pedido_compra_fk
FOREIGN KEY (emp_cod)
REFERENCES public.empleado (emp_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.usuarios ADD CONSTRAINT empleado_usuarios_fk
FOREIGN KEY (emp_cod)
REFERENCES public.empleado (emp_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.movimiento_stock ADD CONSTRAINT usuarios_movimiento_stock_fk
FOREIGN KEY (usu_cod)
REFERENCES public.usuarios (usu_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_pedcompra ADD CONSTRAINT pedido_cabcompra_detalle_pedcompra_fk
FOREIGN KEY (ped_com)
REFERENCES public.pedido_cabcompra (ped_com)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ped_compra ADD CONSTRAINT pedido_cabcompra_ped_compra_fk
FOREIGN KEY (ped_com)
REFERENCES public.pedido_cabcompra (ped_com)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ctas_a_pagar ADD CONSTRAINT compras_ctas_a_pagar_fk
FOREIGN KEY (com_cod)
REFERENCES public.compras (com_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_compra ADD CONSTRAINT compras_detalle_compra_fk
FOREIGN KEY (com_cod)
REFERENCES public.compras (com_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ped_compra ADD CONSTRAINT compras_ped_compra_fk
FOREIGN KEY (com_cod)
REFERENCES public.compras (com_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.ctas_a_cobrar ADD CONSTRAINT ventas_ctas_a_cobrar_fk
FOREIGN KEY (ven_cod)
REFERENCES public.ventas (ven_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_ventas ADD CONSTRAINT ventas_detalle_ventas_fk
FOREIGN KEY (ven_cod)
REFERENCES public.ventas (ven_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_venta ADD CONSTRAINT ventas_pedido_venta_fk
FOREIGN KEY (ven_cod)
REFERENCES public.ventas (ven_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_pedventa ADD CONSTRAINT pedido_cabecera_pedido_detalle_fk
FOREIGN KEY (ped_cod)
REFERENCES public.pedido_cabventa (ped_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.pedido_venta ADD CONSTRAINT pedido_cabecera_pedido_venta_fk
FOREIGN KEY (ped_cod)
REFERENCES public.pedido_cabventa (ped_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.stock ADD CONSTRAINT articulo_stock_fk
FOREIGN KEY (art_cod)
REFERENCES public.articulo (art_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.movimiento_stock ADD CONSTRAINT articulo_movimiento_stock_fk
FOREIGN KEY (art_cod)
REFERENCES public.articulo (art_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_ventas ADD CONSTRAINT stock_detalle_ventas_fk
FOREIGN KEY (dep_cod, art_cod)
REFERENCES public.stock (dep_cod, art_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_pedventa ADD CONSTRAINT stock_pedido_detalle_fk
FOREIGN KEY (dep_cod, art_cod)
REFERENCES public.stock (dep_cod, art_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_compra ADD CONSTRAINT stock_detalle_compra_fk
FOREIGN KEY (dep_cod, art_cod)
REFERENCES public.stock (dep_cod, art_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE public.detalle_pedcompra ADD CONSTRAINT stock_detalle_pedcompra_fk
FOREIGN KEY (dep_cod, art_cod)
REFERENCES public.stock (dep_cod, art_cod)
ON DELETE NO ACTION
ON UPDATE NO ACTION
NOT DEFERRABLE;

ALTER TABLE cargo 
ADD COLUMN created_at TIMESTAMP(0) WITH TIME ZONE NOT NULL DEFAULT date_trunc('minute', NOW());

ALTER TABLE cargo
ADD COLUMN car_estado VARCHAR(10) NOT NULL DEFAULT 'activo',
ADD CONSTRAINT chk_car_estado_valores CHECK (car_estado IN ('activo', 'inactivo'));