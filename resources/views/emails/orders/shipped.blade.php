@component('mail::message')
# Bpk/Ibu {{ $transaction->diproses->name }}
### Berikut adalah data order {{ $transaction->nilai_depo_id ? 'Beli' : 'Jual' }} Anda.
@component('mail::table')
|        |          |
| ------------- |-------------:|
| No. Order | {{str_pad($transaction->id, 10, "0", STR_PAD_LEFT)}} |
| Nama | {{ $transaction->diproses->name }} |
| Email | {{ $transaction->diproses->email }} |
@endcomponent

@component('mail::table')
| Data Transaksi |          |
| ------------- |-------------:|
| Bank Member | {{ $transaction->bank->nama->nama }} |
| No {{ $transaction->nilai_depo_id ? 'Rekening' : 'Akun' }} | {{ $transaction->nilai_depo_id ? $transaction->bank->nomor_rekening : $transaction->currency_member->no_account }} |
| E-Payment / Akun Broker Member | {{ $transaction->currency_member->nama->jenis }} |
| Kurs {{ $transaction->nilai_depo_id ? 'Beli' : 'Jual' }}  (Rp) | {{ $transaction->jenis_currency->{$transaction->nilai_depo_id?'beli':'jual'} }} |
| Diskon Rate (Rp) | {{ $transaction->jenis_currency->diskon ?? '-' }} |
| Jumlah {{ $transaction->nilai_depo_id ? 'Beli' : 'Jual' }}  (USD) | {{ $transaction->jenis_currency->min_trans }} |
| Total Transfer (Rp) | {{ $transaction->total }} |
@endcomponent

# Total Transfer Rp. {{ number_format($transaction->total,0,"",".") }}

##### Berita transfer wajib ditulis

Thanks,<br>
{{ config('app.name') }}
@endcomponent
