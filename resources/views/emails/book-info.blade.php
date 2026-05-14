<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; line-height: 1.6; color: #333; }
        .container { max-width: 600px; margin: 20px auto; padding: 20px; border: 1px solid #e5e7eb; rounded: 12px; }
        .header { border-bottom: 2px solid #3b82f6; padding-bottom: 10px; margin-bottom: 20px; }
        .book-title { color: #1e3a8a; font-size: 24px; font-weight: bold; }
        .details { margin-top: 20px; }
        .footer { margin-top: 30px; font-size: 12px; color: #6b7280; text-align: center; }
        .badge { display: inline-block; padding: 4px 12px; border-radius: 9999px; font-size: 12px; font-weight: 600; text-transform: uppercase; margin-right: 8px; }
        .badge-category { background-color: #dbeafe; color: #1d4ed8; }
        .badge-tag { background-color: #fef3c7; color: #92400e; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>{{ __('Informations sur le Livre') }}</h1>
        </div>
        <div class="details">
            <h2 class="book-title">{{ $book->designation }}</h2>
            <p><strong>{{ __('Auteur') }}:</strong> {{ $book->auteur }}</p>
            <p><strong>{{ __('Éditeur') }}:</strong> {{ $book->editeur }}</p>
            <p><strong>{{ __('Prix') }}:</strong> {{ number_format($book->prix, 2) }} €</p>
            
            <div style="margin: 15px 0;">
                <span class="badge badge-category">{{ $book->category->name ?? 'N/A' }}</span>
                @if($book->tag)
                    <span class="badge badge-tag">{{ $book->tag->name }}</span>
                @endif
            </div>

            <h3 style="margin-top: 20px;">{{ __('Description') }}</h3>
            <p>{{ $book->description }}</p>
        </div>
        <div class="footer">
            <p>&copy; {{ date('Y') }} Biblio App. {{ __('Tous droits réservés.') }}</p>
        </div>
    </div>
</body>
</html>
