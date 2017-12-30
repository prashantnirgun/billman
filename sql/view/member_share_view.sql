CREATE OR REPLACE VIEW member_share_view AS
SELECT a.company_id AS company_id,a.branch_id AS branch_id,a.member_id AS member_id,
       IFNULL(b.share_id,0) AS share_id, IFnull(b.deposit_id,0) AS deposit_id,
       IFNULL(b.share,0) AS share, IFnull(b.deposit,0) AS deposit,
       a.sap_id AS sap_id,a.reference_no AS reference_no,
       a.city_id AS city_id,a.member_name AS member_name,
       a.city_name AS city_name,a.telephone_no AS telephone_no,
       a.gender AS gender,a.member_status AS member_status,
       a.retirement_date AS retirement_date,a.deleted_by_user_id
FROM member_view a
LEFT JOIN share1_view b
ON(a.member_id = b.member_id)
ORDER BY a.city_id,a.member_id;
