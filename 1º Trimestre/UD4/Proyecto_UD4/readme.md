```
ProyectoUD4/
|
|--db.php
|--index.php
|--models/
|   |--coche.php
|--controllers/
|   |--cocheController.php
|--views/
|   |--coche/
|       |--index.php
```

> Creacion de la tabla Reserva que sera necesaria
```sql
CREATE TABLE reservas (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_cliente INT,
    fecha_reserva DATE,
    estado BOOLEAN,
    CONSTRAINT fk_id_cliente FOREIGN KEY (id_cliente) REFERENCES persona(id)
);

INSERT INTO reservas (id_cliente, fecha_reserva, estado) VALUES (1, '2022-01-01', true);
INSERT INTO reservas (id_cliente, fecha_reserva, estado) VALUES (2, '2022-01-02', true);
INSERT INTO reservas (id_cliente, fecha_reserva, estado) VALUES (3, '2022-01-03', true);
```

