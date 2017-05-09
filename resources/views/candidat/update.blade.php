@extends('layout')

@section('title')
    Mettre à jour mes informations
@endsection

@section('data')
    <div class="row">
        <div class="col-responsive">
            <h3>Mettre à jour mes informations</h3>
            <p><strong>Département&nbsp;:</strong> {{ $candidat->departement }}</p>
            <p><strong>Cirsconscription&nbsp;:</strong> {{ $candidat->circonscription }}</p>
            <p><strong>{{ $candidat->titulaire ? 'Titulaire' : 'Suppléant⋅e' }}</strong></p>
            {!! Form::component('bsText', 'components.form.text', ['name', 'value', 'attributes']) !!}
            {!! Form::model($candidat, ['route' => ['candidat.update', $id], 'files' => true]) !!}
                <h3>Identité</h3>
                {!! BootForm::text('nom') !!}
                {!! BootForm::text('prenom') !!}
                <hr>
                <p>
                    Si vous comptez indiquer lors de votre déclaration de candidature
                    à la préfecture un autre nom pour figurer sur votre bulletin de
                    vote, merci de nous l'indiquer ici&nbsp;:
                </p>
                {!! BootForm::text('nom_usage', 'Nom d\'usage (facultatif)') !!}
                {!! BootForm::text('prenom_usage', 'Prénom d\'usage (facultatif)') !!}
                <hr>
                {!! BootForm::select('sexe', 'Sexe à l\'état civil', ['M' => 'M', 'F' => 'F'], null, [
                    'help_text' => 'L\'état civil est demandé pour des raisons légales et ne préjuge en rien de votre genre.'
                ]) !!}
                {!! BootForm::file('photo_file', 'Photo') !!}
                <p>
                    Cette photo servira sur les documents officiels. Elle doit
                    être en couleur, en haute définition (300dpi), prise sur un fond uni,
                    comporter votre visage et vos épaules, et sans vêtements
                    ou accessoires bleu-blanc-rouge.
                @if($candidat->photo)
                    <p>
                        <img src={{ $candidat->photo }} alt="Photo">
                    </p>
                @endif

                {!! BootForm::checkbox(
                    'charte',
                    'J\'accepte la charge graphique nationale, mon matériel officiel me sera fourni par la France insoumise.',
                    '1',
                    true
                ) !!}


                {!! BootForm::text('date_naissance', 'Date de naissance (JJ/MM/AAAA)') !!}
                {!! BootForm::text('activite', 'Activité') !!}
                {!! BootForm::textarea('bio', 'Biographie (200 caractères)') !!}

                <h3>Informations de contact</h3>
                {!! BootForm::email('email', 'Email personnel') !!}
                {!! BootForm::text('telephone', 'Numéro de téléphone personnel') !!}

                <h3>Informations sur la campagne</h3>
                {!! BootForm::email('email_campagne', 'Email de la campagne') !!}
                {!! BootForm::text('twitter', 'Compte Twitter de la campagne', null, ['placeholder' => 'https://twitter.com/identifiant']) !!}
                {!! BootForm::text('facebook', 'Page Facebook de la campagne', null, ['placeholder' => 'https://facebook.com/VotrePage']) !!}
                {!! BootForm::text('colistier_nom', 'Nom du colistier') !!}
                {!! BootForm::text('colistier_prenom', 'Prénom du colistier') !!}
                {!! BootForm::text('colistier_mail', 'Email du colistier') !!}
                {!! BootForm::text('colistier_telephone', 'Numéro de téléphone du colistier') !!}

                <h4>Mandataire financier</h4>
                {!! BootForm::text('mandataire_nom', 'Nom du mandataire financier') !!}
                {!! BootForm::text('mandataire_prenom', 'Prénom du mandataire financier') !!}

                <h6>Adresse</h6>
                {!! BootForm::text('mandataire_adresse_ligne1', 'Ligne 1') !!}
                {!! BootForm::text('mandataire_adresse_ligne2', 'Ligne 2') !!}
                {!! BootForm::text('mandataire_adresse_zipcode', 'Code postal') !!}
                {!! BootForm::text('mandataire_adresse_ville', 'Ville') !!}

                <h6>Contact</h6>
                {!! BootForm::text('mandataire_mail', 'Email du mandataire financier') !!}
                {!! BootForm::text('mandataire_telephone', 'Numéro de téléphone du mandataire financier') !!}

                {!! BootForm::submit('Envoyer') !!}
            {!! Form::close() !!}
        </div>
    </div>
@endsection
