EVENTOS

    DELIMITER $$
        CREATE OR REPLACE DEFINER=`root`@`localhost` EVENT `activacion_estados_empleado_contrato`
        ON SCHEDULE EVERY 23 HOUR STARTS '2021-05-12 23:59:00'
        ON COMPLETION PRESERVE ENABLE
        DO
        BEGIN
            UPDATE contrato INNER JOIN empleado ON empleado.id = contrato.empleado_id 
            SET contrato.estatus_id = 2, empleado.estatus_id = 2 
            WHERE contrato.fecha_fin = CURDATE() AND contrato.estatus_id = 1;
        END $$
