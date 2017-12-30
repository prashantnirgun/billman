CREATE OR REPLACE VIEW  member_loan_detail_view AS
SELECT a.member_id, a.scheme_name, a.city_id,
       a.member_name, b.*
FROM loan_view a
JOIN loan_detail b
ON(a.loan_id = b.loan_id)
